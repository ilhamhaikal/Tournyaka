<?php

namespace App\Controllers;

use App\Models\QuizModel;
use App\Models\EventModel;
use App\Models\Join_here;

class Quiz extends BaseController
{
    protected $quizModel;
    protected $eventModel;
    protected $Join_here;

    public function __construct()
    {
        $this->quizModel = new QuizModel();
        $this->eventModel = new EventModel();
        $this->Join_here = new Join_here();
    }

    public function join_here($nm)
    {
        $quiz = $this->quizModel->findAll();
        $nm_event = str_replace("%20", "", $nm);
        $event = $this->eventModel->where(['nm_event' => $nm_event])->first();
        $id = $event['id'];
        $Join_here = $this->Join_here->where('id_event', $id)->first();
        $data = [
            'title' => 'Join Here | Tournyaka',
            'quiz' => $quiz,
            'join_here' => $Join_here
        ];
        return view('/pages/join_here', $data);
    }

    public function get_quiz()
    {
        // $nm = urldecode($nm_event);
        $event = $this->eventModel->where('id = 1')->first();

        $quiz = $this->quizModel->where('id_join_here = 1')->findAll();

        dd($quiz);
        $data = [];
        $jwb = [];

        for ($i = 0; $i < count($quiz); $i++) {
            array_push($data, $quiz[$i]);

            $pilihan = $this->quizModel->join('jawaban_quiz', 'jawaban_quiz.id_soal = soal_quiz.id AND soal_quiz.id =' . $quiz[$i]['id'])->findAll();
            for ($j = 0; $j < count($pilihan); $j++) {
                $jwb[$i][$j] = $pilihan[$j]['jawaban'];
                $data[$i]['pilihan'] = $jwb[$i];
            }
        }

        echo json_encode($data);
    }
}
