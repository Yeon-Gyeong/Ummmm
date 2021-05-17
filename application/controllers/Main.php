<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
**메인화면 관련 Controller
*/
class Main extends EC_Controller {

    protected $models = array();
    protected $helpers = array();


    public function __construct(){
        parent::__construct();
    }

/*
** index - 메인
*/
    public function index(){

        $view = array();
        $view['view'] = array();

        $view['view']['test'] = 'content';

        $this->data = $view;//출력데이터
        $this->layout = '_layout/basic/layout';//레이아웃스킨
        $this->view = 'main/main';//뷰

    }
}/*end of class*/
