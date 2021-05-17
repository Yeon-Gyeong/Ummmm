<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
** 회원가입 관련 Controller
*/
class Register extends EC_Controller {

    protected $models = array('Member');
    protected $helpers = array('password');

    public function __construct(){
        parent::__construct();
    }


/*
** index - 회원가입 페이지 약관동의
*/
    public function index(){
        $view = array();
        $view['view'] = array();

        $this->data = $view;//출력데이터
        $this->layout = '_layout/basic/layout2';
        $this->view = 'register/terms';//뷰

    }

/*
** 회원가입 폼
*/
    public function signup(){
        $view = array();
        $view['view'] = array();
        $this->data = $view;//출력데이터
        $this->layout = '_layout/basic/layout2';

        $this->load->library('form_validation');

        $config = array(
            array(
                'field' => 'userid',
                'label' => '아이디',
                'rules' => 'trim|required|min_length[4]'
            ),
            array(
                'field' => 'userpw',
                'label' => '비밀번호',
                'rules' => 'trim|required|min_length[8]'
            ),
            array(
                'field' => 'repass',
                'label' => '비밀번호확인',
                'rules' => 'trim|required|matches[userpw]'
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
            $this->view = 'register/signup';//뷰       
        }else{

            $hashpw = password_hash($this->input->post('userpw'), PASSWORD_BCRYPT);
            $userinfo = array(
                'userid' => $this->input->post('userid'),
                'passwd' => $hashpw,
                'user_name' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'level' => '2',
                'reg_date' => date('YYYY-mm-dd H:i:s')
            );

            $this->Member_model->insert_user($userinfo);
            redirect('/');
            

        }


    }


/*
**아이디 중복체크
*/
    public function check_id(){

        $return_message = '';
        $userid = $this->input->post("userid");

        $result = $this->Member_model->get_member($userid, 'count');

        echo $result;

    }
    


}
