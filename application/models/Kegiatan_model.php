<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan_model extends CI_Model{
    private $table = 'kegiatan';

    public function insertKegiatan($data){
        return $this->db->insert($this->table,$data);
    }

    public function getDefaultValues(){
        return [
            'nama'=>'',
            'tgl_kegiatan'=>'',
            'detail'=>''
        ];
    }

    public function getValidationRules(){
        return [
            [
                'field'=>'nama',
                'label'=>'Nama Kegiatan',
                'rules'=>'trim|required'
            ],
            [
                'field'=>'tgl_kegiatan',
                'label'=>'Tanggal Kegiatan',
                'rules'=>'trim|required'
            ],
            [
                'field'=>'detail',
                'label'=>'Detail Kegiatan',
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

    public function getKegiatan(){
        return $this->db->order_by('id_kegiatan','DESC')->get($this->table)->result();
    }

    public function getKegiatanById($id){
        return $this->db->where('id_kegiatan',$id)->get($this->table)->row();
    }

    public function getKegiatanJoinById($id){
        return $this->db->select('operator.id_operator,operator.nama_operator,kegiatan.id_kegiatan,kegiatan.id_operator,kegiatan.nama,kegiatan.detail,kegiatan.tgl_kegiatan,kegiatan.foto')
                        ->from($this->table)
                        ->where('id_kegiatan',$id)
                        ->join('operator','operator.id_operator=kegiatan.id_operator')
                        ->get()
                        ->row();
    }

    public function updateKegiatan($id,$data){
        return $this->db->where('id_kegiatan',$id)->update($this->table,$data);
    }

    public function deleteKegiatan($id){
        $this->db->where('id_kegiatan',$id)->delete($this->table);
    }

    public function paginate($page = null, $perPage = null){
        if($page == null) $page = 0;
        if($perPage == null) $perPage = 6;

        $offset = $this->calculateOffset($page, $perPage);

        return $this->db->select('operator.id_operator,operator.nama_operator,kegiatan.id_kegiatan,kegiatan.id_operator,kegiatan.nama,kegiatan.detail,kegiatan.tgl_kegiatan,kegiatan.foto')
                        ->from($this->table)
                        ->order_by('id_kegiatan','DESC')
                        ->limit($perPage,$offset)
                        ->join('operator','operator.id_operator=kegiatan.id_operator')
                        ->get()
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
        if($perPage == null) $perPage = 6;

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

        if(count($_GET) > 0){
            $config['suffix'] = '?'.http_build_query($_GET,'',"&");
            $config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);
        }else{
            $config['suffix'] = http_build_query($_GET,'',"&");
            $config['first_url'] = $config['base_url'];
        }

        $this->pagination->initialize($config);
        return $this->pagination->create_links();

        
    }

    public function search($page = null, $perPage = null,$keyword){
        if($page == null) $page = 0;
        if($perPage == null) $perPage = 6;

        $offset = $this->calculateOffset($page, $perPage);

        return $this->db->select('operator.id_operator,operator.nama_operator,kegiatan.id_kegiatan,kegiatan.id_operator,kegiatan.nama,kegiatan.detail,kegiatan.tgl_kegiatan,kegiatan.foto')
                        ->from($this->table)
                        ->like('nama',$keyword)
                        ->or_like('detail',$keyword)
                        ->order_by('id_kegiatan','DESC')
                        ->limit($perPage,$offset)
                        ->join('operator','operator.id_operator=kegiatan.id_operator')
                        ->get()
                        ->result();
    }

    public function countAllSearch($keyword){
        return $this->db->like('nama',$keyword)
                        ->or_like('detail',$keyword)
                        ->get($this->table)
                        ->num_rows();
    }
}
?>