<?php

namespace App\Controllers;

use App\Views\Components\HtmlTable;

class HtmxController
{

    public function index()
    {
        $html = '

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>My Website</title>
            <link rel="stylesheet" href="./style.css">
            <link rel="icon" href="./favicon.ico" type="image/x-icon">
             ' . self::fragmentNavigation() . '
            ' . self::fragmentBody() . '
            <!-- ' . var_export($_SERVER, true) . ' -->
        </head>
        <body>
        <main>
            <h1>Welcome to My Website</h1>
        </main>
        <script src="index.js"></script>
        </body>
        </html>

     
        ';
        return $html;
    }



    public function get_fragment($fragmentName)
    {
        $method = 'fragment' . ucfirst(strtolower($fragmentName));
        return self::$method();
    }


    static function fragmentHeader()
    {

        return 'this is the header';
    }

    static function fragmentFooter()
    {

        return 'this is the footer';
    }

    static function fragmentBody()
    {

        $html = '';
        $html .= '<script src="https://unpkg.com/htmx.org"></script>';
        $html .= '<div hx-get="/htmx/header" hx-trigger="load" hx-target="this"></div>';
        $html .= '<div id="body-div"></div>';
        $html .= '<div hx-get="/customer" hx-trigger="load"  hx-target="#body-div" aaahx-swap="beforeend"><!-- Dynamic content will be inserted here --></div>';
        $html .= '<div hx-get="/htmx/footer" hx-trigger="load" hx-target="this"></div>';

        return $html;
    }



    public function fragmentNavigation()
    {
        $html = '
          <!--<button hx-get="/">Home</button> -->
            <button hx-get="/htmx/load/customer"   hx-target="#body-div"  hx-swap="innerHTML ">Show Customers</button>
            <button hx-get="/htmx/load/contract"   hx-target="#body-div" hx-swap="innerHTML ">Show Contracts</button>
            <button hx-get="/htmx/load/rates"    hx-target="#body-div" aaahx-swap="beforeend">Currency rates</button>
        ';       

        $html = '
          <!--<button hx-get="/">Home</button> -->
            <button hx-get="/customer"   hx-target="#body-div"  hx-swap="innerHTML ">Show Customers</button>
            <button hx-get="/contract"   hx-target="#body-div" hx-swap="innerHTML ">Show Contracts</button>
            <button hx-get="/rates"    hx-target="#body-div" aaahx-swap="beforeend">Currency rates</button>
        ';
        return $html;
    }

    public function fragmentCustomers()
    {

        // hx-get="/customer" hx-trigger="load"  hx-target="#body-div" aaahx-swap="beforeend"
        // $html = '<div hx-get="/customer" hx-trigger="load" hx-target="this"></div>';
        // return $html;
    }


    function isJson($string) {
        return ((is_string($string) &&
            (is_object(json_decode($string)) ||
                is_array(json_decode($string))))) ? true : false;
    }
    public function load($path)
    {


        $host = 'http://' . $_SERVER['HTTP_HOST'];
        $url = $host . '/' . $path;

        $content = file_get_contents($url);
        trace($url);
        if(is_object($content)){
             $content= (array)$content;
        }

        return  !self::isJson($content) && !is_array($content)  ? $content :  HtmlTable::render(json_decode($content,true));

    }


}