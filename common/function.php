<?php

function view($view, $data = [])
{
    extract($data);

    $view = str_replace('.', '/', $view);
    include_once "views/$view.php";
}
