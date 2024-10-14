<?php

namespace App\Views\Templates;

use App\Framework\View;
use App\Views\Components\HtmlTable;

class CustomerListView extends View
{

    static string  $template_name = 'Customer.Form';

    public static  function render(array $data): string    {
        return HtmlTable::render(  $data, [ 'id', 'name', 'address', 'phone', 'email']);
    }



}