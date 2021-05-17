<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
** 강의 관련 Controller
*/
class Lecture extends EC_Controller {

    protected $models = array('Lecture');
    protected $helpers = array();


    public function __construct(){
        parent::__construct();
    }

/*
** index - 강의리스트 페이지
*/
    public function index(){
        $view = array();
        $view['data'] = '-Lecture contents';

        $this->data = $view;

        $this->view = array(
            'layout' => 'lecture/lecture_list',//view 파일 경로
            'view' => $this->data//view 에 표시할 데이터
        );

    }
}
