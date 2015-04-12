<?php namespace CoreProc\JuanNJuan\Http\Controllers;

use CoreProc\JuanNJuan\Channel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class DefaultViewController extends ViewController {

    private $view;

    private function makeView($id, $title, $data = [])
    {
        $view_args = [
            'view' => $this->view,
            'app'  => $this->app,
        ];

        $this->view->id    = $id;
        $this->view->title = $title;

        return view("juannjuan.{$this->view->group}.{$id}.{$this->view->layout}", array_merge($view_args, $data));
    }

    public function __construct()
    {
        $this->__initializeView();

        $this->view         = new \stdClass;
        $this->view->group  = 'default';
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

    public function viewSession($sessionId)
    {
        try {
            $channel = Channel::findOrFail($sessionId);

            return $this->makeView('session','Session: '. $channel->name, ["session_id" => $sessionId, "channel" => $channel]);
        } catch (ModelNotFoundException $e) {
            app()->abort(404);
        }

    }
}
