<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends CI_Model{
    private $table = 'gallery';

    public function insertGallery($data){
        return $this->db->insert($this->table,$data);
    }

    public function getDefaultValues(){
        return [
            'nama'=>'',
        ];
    }

    public function getValidationRules(){
        return [
            [
                'field'=>'nama',
                'label'=>'Nama Foto',
                'rules'=>'trim|required'
            ]
        ];
    }

    public function validate(){
        $rules = $this->getValidationRules();
        $this->form_validation->set_rules($rules);
        $this->form_validation->set_error_delimiters('<span class="text-danger" style="font-size:14px">','</span>');
        return $this->form_validation->run();
    }

    public function getGallery(){
        return $this->db->order_by('id_gallery','DESC')->get($this->table)->result();
    }

    public function getGalleryById($id){
        return $this->db->where('id_gallery',$id)->get($this->table)->row();
    }

    public function updateGallery($id,$data){
        return $this->db->where('id_gallery',$id)->update($this->table,$data);
    }

    public function deleteGallery($id){
        $this->db->where('id_gallery',$id)->delete($this->table);
    }

    public function paginate($page = null, $perPage = null){
        if($page == null) $page = 0;
        if($perPage == null) $perPage = 9;

        $offset = $this->calculateOffset($page, $perPage);

        return $this->db->order_by('id_gallery','DESC')
                        ->limit($perPage,$offset)
                        ->get($this->table)
                        ->result();
    }

    public function calculateOffset($page,$perPage){
        if($page==0){
            $offset = 0;
        }else{
            $offset = ($page * $perPage) - $perPage;
        }
        return $offset;
    }

    public function countAll(){
        return $this->db->get($this->table)->num_rows();
    }

    public function createPagination($baseUrl,$jumlah,$perPage = null){
        if($perPage == null) $perPage = 9;

        $config['base_url'] = site_url($baseUrl);
        $config['total_rows'] = $jumlah;
        $config['per_page'] = $perPage;
        $config['use_page_numbers'] = true;
        
        $config['full_tag_open'] 	= '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] 	= '</ul></nav></div>';
        $config['num_tag_open'] 	= '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] 	= '</span></li>';
        $config['cur_tag_open'] 	= '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] 	= '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] 	= '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] 	= '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] 	= '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] 	= '</span></li>';
    }
}
?>