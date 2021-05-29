<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
**관리자 관련 Controller
*/
class Manager extends EC_Controller {

    protected $models = array('Manager');
    protected $helpers = array('password');


    public function __construct(){
        parent::__construct();
    }

/*
** index - 관리자 로그인
*/
    public function index(){

        $view = array();
        $view['view'] = array();


        $this->load->library('form_validation');
        $config = array(
            array(
                'field' => 'm_id',
                'label' => '아이디',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'm_pw',
                'label' => '비밀번호',
                'rulles' => 'trim|required'

            )
        );
        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == false){
            if(validation_errors()){
                echo '<script>alert("아이디 혹은 비밀번호를 확인하세요.");</script>';
            }else{
                $this->view = 'manager/login';
            }
        }else{
            $m_info = array(
                'm_id' => $this->input->post('m_id'),
                'm_pw' => $this->input->post('m_pw')
            );

            $db_data = $this->Manager_model->get_manager($m_info);

            if($db_data){
                if(password_verify($m_info['m_pw'], $db_data['passwd'])){
                    redirect('manager/mng_lecture');
                }else{
                    echo '<script>alert("아이디 혹은 비밀번호를 확인하세요.");</script>';
                }

            }else{
                echo '<script>alert("아이디 혹은 비밀번호를 확인하세요.");</script>';
            }


        }

        $this->data = $view;//출력데이터
        $this->layout = '_layout/basic/layout2';//레이아웃스킨
        $this->view = 'manager/login';//뷰

    }

/*
**강의관리
*/
    function mng_lecture(){
        $view = array();
        $view['view'] = array();

        $this->data = $view;//출력데이터
        $this->layout = '_layout/basic/layout2';//레이아웃스킨
        $this->view = 'manager/mng_lecture';//뷰        
    }


/*
**회원관리
*/
    function mng_users(){
        $view = array();
        $view['view'] = array();

        $view['view']['users'] = $this->Manager_model->get_users();

        $this->data = $view;//출력데이터
        $this->layout = '_layout/basic/layout2';//레이아웃스킨
        $this->view = 'manager/mng_users';//뷰  
    }     




}/*end of class*/
