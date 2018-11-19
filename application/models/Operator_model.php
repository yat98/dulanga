<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator_model extends CI_Model{
    private $table = 'operator';

    public function getDefaultValues(){
        return [
            'username'=>'',
            'password'=>'',
        ];
    }

    public function getValidationRules(){
        return [
            [
                'field'=>'username',
                'label'=>'Username',
                'rules'=>'trim|required'
            ],
            [
                'field'=>'password',
                'label'=>'Password',
                'rules'=>'trim|required'
            ]
        ];
    }

    public function validate(){
        $rules = $this->getValidationRules();
        $this->form_validation->set_rules($rules);
        return $this->form_validation->run();
    }

    public function run($data){
        $username = $data->username;
        $password = md5(sha1($data->password));

        $operator = $this->db->where('username',$username)
                             ->where('password',$password)
                             ->get($this->table)
                             ->row();
        
        if(count($operator)){
            $sessionData = [
                'login'=>true,
                'username'=>$username,
                'id'=>$operator->id_operator
            ];
            $this->session->set_userdata($sessionData);
            return true;
        }

        return false;
    }

    public function logout(){
        $sessionData = ['login','username','id'];
        $this->session->unset_userdata($sessionData);
        $this->session->sess_destroy();
    }
}
?>