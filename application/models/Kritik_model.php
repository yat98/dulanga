<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kritik_model extends CI_Model{
    private $table = 'kritik_saran';

    public function insertKritik($data){
        return $this->db->insert($this->table,$data);
    }

    public function getDefaultValues(){
        return [
            'nama'=>'',
            'email'=>'',
            'komentar'=>''
        ];
    }

    public function getValidationRules(){
        return [
            [
                'field'=>'nama',
                'label'=>'Nama',
                'rules'=>'trim|required'
            ],
            [
                'field'=>'email',
                'label'=>'Email',
                'rules'=>'trim|required|callback_isEmailValid'
            ],
            [
                'field'=>'komentar',
                'label'=>'Komentar',
                'rules'=>'trim|required'
            ],
        ];
    }

    public function validate(){
        $rules = $this->getValidationRules();
        $this->form_validation->set_rules($rules);
        $this->form_validation->set_error_delimiters('<span class="text-danger" style="font-size:14px">','</span>');
        return $this->form_validation->run();
    }

    public function getKritik(){
        return $this->db->order_by('id_kritik','DESC')->get($this->table)->result();
    }

    public function deleteKritik($id){
        $this->db->where('id_kritik',$id)->delete($this->table);
    }
}
?>