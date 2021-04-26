<?php

namespace application\controllers;

class BoardController extends Controller
{
    public function index()
    {
        require_once 'application/views/board/index.php';
    }
}