<?php

namespace App\Controller;

use App\Service\QuestionService;

class QuestionController extends BaseController
{

    public function add($room)
    {
        $this->setJs('questionAdd');
        $this->set(['room' => $room]);
        $this->render('question/add');
    }

    public function answer($questionId)
    {
        $questionService = new QuestionService();
        $question = $questionService->getOneById($questionId);
        $this->setJs('questionAnswer');
        $this->setJsVar(['room' => $question['room']]);
        $this->set(['question' => $question]);
        $this->render('question/answer');
    }

    public function ajaxAdd()
    {
        $this->setLayout('');
        $formValues = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (!isset($formValues['id'], $formValues['text'])) {
            $this->set(['content' => 'INVALID']);
            $this->render('data/json');
            return;
        }
        $questionService = new QuestionService();
        $added = $questionService->add($formValues['id'], $formValues['name'] ?? 'Anonym', $formValues['text']);
        if ($added) {
            $this->set(['content' => 'OK']);
        } else {
            $this->set(['content' => 'INVALID']);
        }
        $this->render('data/json');
    }

    public function ajaxAnswer()
    {
        $this->setLayout('');
        $formValues = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (!isset($formValues['id'], $formValues['answer'])) {
            $this->set(['content' => 'INVALID']);
            $this->render('data/json');
            return;
        }
        $questionService = new QuestionService();
        $answered = $questionService->answer((int) $formValues['id'], $formValues['answer']);
        if ($answered) {
            $this->set(['content' => 'OK']);
        } else {
            $this->set(['content' => 'INVALID']);
        }
        $this->render('data/json');
    }

    public function ajaxReact($id, $action)
    {
        $this->setLayout('');
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        $action = filter_var($action, FILTER_SANITIZE_STRING);

        $questionService = new QuestionService();
        $reacted = $questionService->react((int) $id, $action);
        if ($reacted) {
            $this->set(['content' => 'OK']);
        } else {
            $this->set(['content' => 'INVALID']);
        }
        $this->render('data/json');
    }
}
