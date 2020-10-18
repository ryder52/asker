<?php

namespace App\Controller;

class ErrorController extends BaseController
{
    public function notFound()
    {
        http_response_code(404);
        $this->render('error/notFound');
    }

    public function unauthorized()
    {
        http_response_code(403);
        $this->render('error/unauthorized');
    }
}
