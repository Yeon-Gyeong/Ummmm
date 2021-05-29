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

    	//$this->layout = '_layout/basic/layout';
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


        $this->load->library('form_validation');

        $config = array(
            array(
                'field' => 'passwd',
                'label' => '비밀번호',
                'rules' => 'trim|required|min_length[8]'
            ),
            array(
                'field' => 'repass',
                'field' => '비밀번호확인',
                'rules' => 'trim|required|matches[passwd]'
            ),
            array(
                'field' => 'username',
                'label' => '이름',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'email',
                'label' => '이메일',
                'rules' => 'trim|required'
            ),
        );

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == false){
            if(validation_errors()){
                echo '<script>alert("입력하신 내용을 확인하세요.");</script>';
            }
        }

        $this->data = $view;
    	//$this->layout = '_layout/basic/layout';
    	$this->view = 'mypage/info';    	
    }
}