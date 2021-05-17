<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class EC_Controller extends CI_Controller {

    protected $view;
    protected $data = array();
    protected $layout;
    protected $helpers = array();
    protected $models = array();
    protected $model_string = '%_model';


    public function __construct(){
        parent::__construct();
        $this->_load_models();
        $this->_load_helpers();

    }

    public function _remap($method){
        if(method_exists($this, $method)){
            call_user_func_array(array($this, $method), array_slice($this->uri->rsegments, 2));
        }

        $this->_load_view();

    }


    protected function _load_view(){

        if(!isset($this->view)){
            $this->view = false;
        }

        if($this->view !== false){
            if(is_array($this->view)){
                $data['yield'] = '';
                foreach($this->view as $val){
                    $data['yield'] .= $this->load->view($val, $this->data, true);
                }
            }else{
                $data['yield'] = $this->load->view($this->view, $this->data, true);
            }

            $data = array_merge($this->data, $data);
            $layout = false;

            if(!isset($this->layout)){
                $this->layout = false;
            }else if($this->layout !== false){
                $layout = $this->layout;
            }

            if($layout === false){
                $this->output->set_output($data['yield']);
            }else{
                $this->load->view($layout, $data);
            }


        }

    }

    private function _load_models(){
        foreach($this->models as $model){
            $this->load->model($this->_model_name($model));
        }
    }

    protected function _model_name($model){
        return str_replace('%', $model, $this->model_string);
    }


    private function _load_helpers(){
        foreach($this->helpers as $helper){
            $this->load->helper($helper);
        }
    }
}
