<?php namespace CoreProc\JuanNJuan\Http\Controllers;

class ViewController extends Controller {
    private $view;

    private function makeView($id, $title) {
        $this->view->id = $id;
        $this->view->title = $title;
        return view("juannjuan.{$this->view->group}.{$this->view->layout}.{$id}", [
            'view' => $this->view,
        ]);
    }

    public function __construct()
    {
        $this->view = new \stdClass;
        $this->view->group = 'default';
        $this->view->layout = 'default';
    }

    public function viewHome()
    {
        return $this->makeView('home', "Home");
    }
}