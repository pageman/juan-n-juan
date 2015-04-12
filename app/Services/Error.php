<?php


namespace CoreProc\JuanNJuan\Services;
use Exception;
use Response;
use App;

class Error {
    public static function response(Exception $e)
    {
        if (App::environment() == 'local') {
            return Response::json([
                'error' => [
                    'file'    => $e->getFile(),
                    'line'    => $e->getLine(),
                    'message' => $e->getMessage()
                ]
            ]);
        }

        return Response::json([
            'error' => [
                'file'    => $e->getFile(),
                'line'    => $e->getLine(),
                'message' => $e->getMessage()
            ]
        ]);
    }
}
