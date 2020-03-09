<?php
namespace app\controllers;

class ScheduleController extends Controller{
    public function index($request, $response, $args){
        $this->view('schedule', [
            'nome' => 'Vanderson',
            'title' => 'Schedule'
        ]);
    }
}