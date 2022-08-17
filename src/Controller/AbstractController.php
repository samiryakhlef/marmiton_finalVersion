<?php

namespace App\Controller;

abstract class AbstractController implements InterfaceController
{
    public function render($view_path, $data = [])
    {
        extract($data);
        include_once __DIR__.'/../Views/'.$view_path;
    }

    public function sendJson($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data, JSON_THROW_ON_ERROR);
        exit;
    }
}