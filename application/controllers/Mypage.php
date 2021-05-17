<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
** 마이페이지 Controller
*/
class Mypage extends EC_Controller {

    protected $models = array('Member');
    protected $helpers = array('password');

    public function __construct(){
        parent::__construct();
    }


/*
** index - 마이페이지
*/
    public function index(){

    	$this->layout = '_layout/basic/layout';
    	$this->view = 'mypage/mypage';
    }

/*
** 회원정보 수정
*/
    public function info(){

        $view = array();
        $view['view'] = array();

    	$userid = $this->session->userdata('cid');
    	$userinfo = $this->Member_model->get_member($userid);
    	$view['view']['info'] = $userinfo;

        $this->data = $view;
    	$this->layout = '_layout/basic/layout';
    	$this->view = 'mypage/info';    	
    }
}