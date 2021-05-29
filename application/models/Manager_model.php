<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
** 관리자페이지
*/
class Manager_model extends CI_Model {

    public function __construct(){
        parent::__construct();

    }

    //관리자 정보  가져오기
    public function get_manager($data){
        $sql = "select user_id, passwd, level from ec_user where user_id = ? and level = '1'";
        $query = $this->db->query($sql, array($data['m_id']));

        return $query->row_array();
        

    }

    public function get_users(){
        $sql = "select * from ec_user";

        $query = $this->db->query($sql);

        return $query->result_array();
    }

  


}/*end of class */
