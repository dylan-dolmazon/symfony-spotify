<?php
namespace App\Controllers;


class DylanController extends Controller
{
    public function index()
    {
        $this->render('dylan/index');
    }

    public function test()
    {
        $this->render('dylan/test');
    }
}