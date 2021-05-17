<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
** 회원관리
*/
class Member_model extends CI_Model {

    public function __construct(){
        parent::__construct();

    }

    //회원정보 가져오기
    public function get_member($id, $count=''){
        $sql = "select user_id, passwd, user_name, email, level from ec_user where user_id = ?";
        $query = $this->db->query($sql, array($id));
        
        if($count){
        	return $query->num_rows();
        }else{
        	return $query->row_array();
        }

    }

    //회원가입
    public function insert_user($data){
    	$sql = "insert into ec_user (user_id, passwd, user_name, email, level, reg_date) values(?, ?, ?, ?, ? ,?)";
    	$this->db->query($sql, array($data['userid'], $data['passwd'], $data['user_name'], $data['email'], $data['level'], $data['reg_date']));

    }

    //아이디 찾기
    public function get_id($data){
    	$sql = "select user_id from ec_user where user_name=? and email=?";
    	$query = $this->db->query($sql, array($data['user_name'], $data['email']));
    	return $query->row_array();
    }

    //비밀번호 찾기 - 회원확인
    public function get_email($data){
    	$sql = "select user_id, email from ec_user where user_id=? and email=?";
    	$query = $this->db->query($sql, array($data['userid'], $data['email']));
    	return $query->row_array();
    }

    //비밀번호 재설정
    public function set_password($data){
    	$sql = "update ec_user set passwd=? where user_id=?";
    	$this->db->query($sql, array($data['passwd'], $data['user_id']));

    }



}/*end of class */
