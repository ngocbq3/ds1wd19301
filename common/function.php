<?php

function view($view, $data = [])
{
    extract($data);

    $view = str_replace('.', '/', $view);
    include_once ROOT_DIR . "views/$view.php";
}

//hàm dd dùng để debug 
function dd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}
