<?php
namespace App\Views;

use App\Views\Components\HtmlTable  ;


$names = ['count', 'id', 'name', 'address', 'phone', 'email'];
HtmlTable::render($data, $names, $title, $style);
