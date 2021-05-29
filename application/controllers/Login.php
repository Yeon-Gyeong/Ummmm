<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
** 로그인 관련 Controller
*/
class Login extends EC_Controller {

    protected $models = array('Member');
    protected $helpers = array('password', 'common');

    public function __construct(){
        parent::__construct();
    }


/*
** index - 로그인페이지
*/
    public function index(){


        $view = array();
        $view['view'] = array();
        $this->data = $view;

        //폼검증 룰 설정
        $this->load->library('form_validation');
        $config = array(
            array(
                'field' => 'userid',
                'label' => '아이디',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'userpw',
                'label' => '비밀번호',
                'rules' => 'trim|required'
            ),
        );
        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == false){
            if(validation_errors()){
                echo '<script>alert("아이디 혹은 비밀번호를 확인하세요.");</script>';
            }
            $this->view = 'login/login';

        }else{
            $userinfo = array(
                'userid' => $this->input->post('userid'),
                'passwd' => $this->input->post('userpw')
            );
            $check = $this->_check_id_pw($userinfo);

            if($check != false){

                $setdata = array(
                    'cname' => $check['user_name'],
                    'cid' => $check['user_id'],
                    'clevel' => $check['level']
                );
                $this->session->set_userdata($setdata);
                redirect('/');

            }else{
                echo '<script>alert("아이디 혹은 비밀번호를 확인하세요.");</script>';

                $this->view='login/login';

            }
        }

    }

/*
** ID/PW 인증
*/
    private function _check_id_pw($userinfo){

        $user_id = $userinfo['userid'];
        $passwd = $userinfo['passwd'];

        $userdata = $this->Member_model->get_member($user_id);
        $db_pw = $userdata['passwd'];

        if(password_verify($passwd, $db_pw)){
            return $userdata;
        }else{
            return false;
        }

    }

/*
**로그아웃
*/
    public function logout(){
        if($this->session->userdata()){
            $this->session->sess_destroy();
            redirect(site_url());
        }
    }


/*
**아이디 찾기
*/
    public function forgot_id(){

        $view = array();
        $view['view'] = array();
        $this->layout='_layout/basic/layout2';

        $this->load->library('form_validation');

        $config = array(
            array(
                'field' => 'email',
                'label' => '이메일',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'username',
                'label' => '이름',
                'rules' => 'trim|required'
            ),
        );

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == false){
            if(validation_errors()){
                echo '<script>alert("이메일주소 혹은 이름을 확인하세요.");</script>';
            }
           // $this->view = 'login/forgot_id';

        }else{
            $userinfo['email'] = $this->input->post('email');
            $userinfo['user_name'] = $this->input->post('username');


            $dbinfo = $this->Member_model->get_id($userinfo);
            if(!empty($dbinfo)){
                $userid = mb_substr($dbinfo['user_id'],0,-2).'**';
                $view['view']['userid'] = $userid;
            }else{
                $view['view']['userid'] = 'empty';
            }
        }

        $this->data = $view;
        $this->view='login/forgot_id';

    }


/*
**비밀번호 초기화
*/
    function forgot_pw(){

        $view = array();
        $view['view'] = array();

        $this->load->library('form_validation');

        $config = array(
            array(
                'field' => 'userid',
                'label' => '아이디',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'email',
                'label' => '이메일',
                'rules' => 'trim|required'
            )
        );

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == false){
            if(validation_errors()){
                echo '<script>alert("아이디 혹은 이메일을 입력해주세요.");</script>';
            }
        }else{
            $userinfo['userid'] = $this->input->post('userid');
            $userinfo['email'] = $this->input->post('email');

            $dbinfo = $this->Member_model->get_email($userinfo);
            if(!empty($dbinfo)){
                if($this->send_email($dbinfo)){
                    $view['view']['result'] = 'success';
                }
            }else{
                $view['view']['result'] = 'false';

            }
        }

        $this->data = $view;
        $this->layout='_layout/basic/layout2';
        $this->view='login/forgot_pw';
    }

    /*
    ** 임시 비밀번호 메일발송
    */
    private function send_email($userinfo){

        $random_pw = random_str();

        $target = $userinfo['email'];
        $this->load->library('email');

        $this->email->from('master@mocl.com', '모두의클래스');
        $this->email->to($target);
       
        $this->email->subject('모두의 클래스 비밀번호 초기화 안내');
        $this->email->message($random_pw);

        if($this->email->send(false)){

            $reset_data = array(
                'user_id' => $userinfo['user_id'],
                'passwd' => $random_pw
            );

            $this->reset_password($reset_data);
            return true;
        }else{
            return false;
        }
    }

    /*
    **비밀번호 초기화
    */
    private function reset_password($data){

        $data['passwd'] = password_hash($data['passwd'], PASSWORD_BCRYPT);
        $this->Member_model->set_password($data);
    }

}/*end of class*/
