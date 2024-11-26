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

//Hàm session_flash, sẽ hủy session ngay lập tức
function session_flash($key)
{
    $message = $_SESSION[$key] ?? '';
    unset($_SESSION[$key]);
    return $message;
}
