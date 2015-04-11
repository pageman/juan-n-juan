<?php namespace CoreProc\JuanNJuan\Http\Controllers;

class DefaultViewController extends ViewController {

    private $view;

    private function makeView($id, $title) {
        $this->view->id = $id;
        $this->view->title = $title;
        return view("juannjuan.{$this->view->group}.{$id}.{$this->view->layout}", [
            'view' => $this->view,
            'app' => $this->app
        ]);
    }

    public function __construct()
    {
        $this->__initializeView();

        $this->view = new \stdClass;
        $this->view->group = 'default';
        $this->view->layout = 'default';
    }

    public function viewHome()
    {
        return $this->makeView('home', "Home");
    }

    public function viewChannels()
    {
        return $this->makeView('channels', "Channels");
    }

    public function viewSession()
    {
        return $this->makeView('session', "Session");
    }
}