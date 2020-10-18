<?php

namespace App\Controller;

use App\Service\QuestionService;
use App\Service\RoomService;
use App\Service\AppService;

class RoomController extends BaseController
{

    public function ajaxAdd()
    {
        $this->setLayout('');
        $formValues = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (!isset($formValues['name'])) {
            $this->set(['content' => 'INVALID']);
            $this->render('data/json');
            return;
        }
        $roomService = new RoomService();
        $id = $roomService->create($formValues['name']);
        if ($id) {
            $this->set(['content' => $id]);
        } else {
            $this->set(['content' => 'INVALID']);
        }
        $this->render('data/json');
    }

    public function detail($room)
    {
        $roomService = new RoomService();
        $room = $roomService->getById($room);
        if (!empty($room)) {
            $questionService = new QuestionService();
            $questions = $questionService->getAllForRoom($room['id']);
            $this->set([
                'room' => $room['id'],
                'name' => $room['name'],
                'questions' => $questions,
                'isAuthor' => AppService::getUserId() === (int) $room['author'],
            ]);
            $this->setJs('roomDetail');
            $this->setJsVar(['room' => $room['id']]);
            $this->setCss('roomDetail');
            $this->render('room/detail');
        } else {
            $this->render('error/notFound');
        }
    }
}
