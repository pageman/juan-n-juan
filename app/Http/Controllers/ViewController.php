<?php namespace CoreProc\JuanNJuan\Http\Controllers;

class ViewController extends Controller {

    protected $app;

    public function __construct()
    {
        $this->__initializeView();
    }

    protected function __initializeView()
    {
        $this->app = new \stdClass;
        $this->app->name = "Juan N Juan";
    }

}