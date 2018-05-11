<?php
namespace app\index\controller;

class Index
{
    public function index()
    {
        return view("index");
    }

    public function open()
    {
    	return view("open");
    }
}
