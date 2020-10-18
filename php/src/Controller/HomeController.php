<?php

namespace App\Controller;

use App\Service\AppService;
use App\Service\RoomService;

class HomeController extends BaseController
{

    public function index()
    {
        $this->setJs('home');
        if (AppService::isLogged()) {
            $roomService = new RoomService();
            $rooms = $roomService->getByAuthor();
            $this->set(['rooms' => $rooms]);
        }
        $this->render('home/landing');
    }
}
