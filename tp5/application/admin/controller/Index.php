<?php
namespace app\admin\controller;

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
