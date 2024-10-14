<?php

namespace App\Views\Components;

class HtmlTable
{
    public static function render($tableData, $names = [] /* ['count', 'id', 'name', 'address', 'phone', 'email']*/, $title = 'Table 1', $style = '')
    {
        if (!$names and count($tableData) > 0) {
            foreach($tableData  as $key => $value){
                $names = array_keys( (array)$tableData[$key]);
                break;
            }
        }

        $html = '';
        $html .= '<style>
            .table_component {
                overflow: auto;
                width: 100%;
            }
        
            .table_component table {
                border: 1px solid #dededf;
                border: 1px solid #ffffff;
                
                ----height: 100%;
                width: 100%;
                aaatable-layout: auto;
                border-collapse: collapse;
                border-spacing: 1px;
                text-align: left;
            }
        
            .table_component caption {
                caption-side: top;
                text-align: left;
            }
        
            .table_component th {
                border: 1px solid #eeeeee;
                background-color: #fa6428;
                color: #ffffff;
                padding: 5px;
            }
        
            .table_component td {
                border: 1px solid #fa64280;
                border: 1px solid #eeeeee;
                background-color: #ffffff;
                background-color: #f4f4f4;
                color: #000000;
                padding: 5px;
            }
            
            .even td{
                background-color: #f4f4f4;
                background-color: #fcfcfc;
                }

            .odd td {
                background-color: #ffffff;
            }
        </style>' . "\n";

        if ($style) {
            $html .= '<style>' . $style . '</style>';
        }

        $html .= '<div class="table_component" role="region" tabindex="0">';
        $html .= '<table>';
        $html .= '<caption>' . $title . '</caption>';

        /******** Head ********/

        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th>&nbsp;</th>';

        foreach ($names as $name) {
            $html .= '<th>' . ucwords($name) . '</th>';
        }

        $html .= '</tr>';
        $html .= '</thead>';

        /******** Body ********/

        $html .= "\n<tbody>";

        $rowNum = 0;
        foreach ($tableData as $row) {
            $rowNum++;
            $tr_class = $rowNum % 2 == 0 ? 'even' : 'odd';

            $row = (array)$row;
            $html .= '<tr class="'.$tr_class.'">';
            $html .= '<td>' . $rowNum . '</td>';
            foreach ($row as $td) {
               // $td = is_string($td) ? $td : json_encode($td);
                $html .= '<td>' . $td . '</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</tbody>';
        $html .= '</table>';

        // $html .= '<div style="margin-top:8px">Made with <a href="https://www.htmltables.io/" target="_blank">HTML Tables</a></div>';
        return self::indentHTML($html);
    }

    private static function indentHTML(string $html)
    {
        $html = str_replace('<table>', "\n<table>\n", $html);
        $html = str_replace('<thead>', "\n<thead>\n", $html);
        $html = str_replace('<tr>', "\n\t<tr>\n", $html);
        $html = str_replace('</tr>', "\n\t</tr>\n", $html);
        $html = str_replace('<td>', "\n\t\t\t<td>", $html);
        $html = str_replace('<th>', "\n\t\t\t<th>", $html);

        return $html;
    }
}