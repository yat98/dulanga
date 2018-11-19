<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper(['url','email','tgl_indo']);
        $this->load->library(['form_validation','session','pagination']);
        $this->load->model('kritik_model','kritik',true);
        $this->load->model('operator_model','operator',true);
        $this->load->model('gallery_model','gallery',true);
        $this->load->model('kegiatan_model','kegiatan',true);
    }

    public function index($page = null){
        $header = 'guest/header';
        $content = 'guest/landing';
        $footer = 'guest/footer';
        $landing = true; $sejarah = false; $gallery = false;
        $data = (object) $this->kritik->getDefaultValues();
        $perPage = 6;
        $kegiatans = $this->kegiatan->paginate($page,$perPage);
        $jumlah = $this->kegiatan->countAll();
        $pagination = $this->kegiatan->createPagination('kegiatan',$jumlah,$perPage);
        $this->load->view('template',compact('header','content','footer','landing','sejarah','gallery','data','kegiatans','jumlah','pagination'));
    }

    public function sejarah(){
        $header = 'guest/header';
        $content = 'guest/sejarah';
        $footer = 'guest/footer';
        $landing = false; $sejarah = true; $gallery = false;
        $data = (object) $this->kritik->getDefaultValues();
        $this->load->view('template',compact('header','content','footer','landing','sejarah','gallery','data'));
    }

    public function gallery($page=null){
        $header = 'guest/header';
        $content = 'guest/gallery';
        $footer = 'guest/footer';
        $landing = false; $sejarah = false; $gallery = true;
        $data = (object) $this->kritik->getDefaultValues();
        $perPage = 9;
        $gallerys = $this->gallery->paginate($page,$perPage);
        $jumlah = $this->gallery->countAll();
        $pagination = $this->kegiatan->createPagination('gallery',$jumlah,$perPage);
        $this->load->view('template',compact('header','content','footer','landing','sejarah','gallery','data','gallerys','pagination'));
    }

    public function isEmailValid($str){
        if (!valid_email($str)) {
            $this->form_validation->set_message('isEmailValid','Email tidak valid.');
            return false;
        }
        return true;
    }

    public function createKritik(){
        if(!$_POST){
            $data = (object) $this->kritik->getDefaultValues();
        }else{
            $data = (object) $this->input->post(null,true);
        }

        if(!$this->kritik->validate()){
            $header = 'guest/header';
            $content = 'guest/landing';
            $footer = 'guest/footer';
            $landing = true; $sejarah = false; $gallery = false;
            $this->load->view('template',compact('header','content','footer','landing','sejarah','gallery','data','berhasil'));
            return;
        }
        $this->session->set_flashdata('kritikBerhasil',true);
        $this->kritik->insertKritik($data);
        redirect('');
    }

    public function detail($id = null){
        if($id==null) redirect('kegiatan');

        $header = 'guest/header';
        $content = 'guest/detail_kegiatan';
        $footer = 'guest/footer';
        $landing = false; $sejarah = false; $gallery = false;
        $data = (object) $this->kritik->getDefaultValues();
        $kegiatan = $this->kegiatan->getKegiatanJoinById($id);
        
        $this->load->view('template',compact('header','content','footer','landing','sejarah','gallery','data','kegiatan'));
    }

    public function cari($page=null){
        $header = 'guest/header';
        $content = 'guest/landing';
        $footer = 'guest/footer';
        $landing = true; $sejarah = false; $gallery = false;
        $data = (object) $this->kritik->getDefaultValues();
        $keyword = $this->input->get('keyword');
        $perPage = 6;
        $kegiatans = $this->kegiatan->search($page,$perPage,$keyword);
        $jumlah = $this->kegiatan->countAllSearch($keyword);
        $pagination = $this->kegiatan->createPagination('kegiatan/cari',$jumlah,$perPage);

        if(!$kegiatans){
            $this->session->set_flashdata('cariGagal','Pencarian kegiatan dengan nama '.$keyword.' tidak ditemukan');
            redirect('kegiatan');
        }

        $this->load->view('template',compact('header','content','footer','landing','sejarah','gallery','data','kegiatans','jumlah','pagination'));
    }
    
    public function login(){
        if(!$_POST){
            $data = (object) $this->operator->getDefaultValues();
        }else{
            $data = (object) $this->input->post();
        }

        if(!$this->operator->validate()){
            $content = 'operator/login'; 
            $this->load->view('template',compact('content','data'));
            return;
        }

        if(!$this->operator->run($data)){
            $this->session->set_flashdata('pesan_error','Username atau Password salah');
            redirect('login');
        }else{
            redirect('operator');
        }
    }

    public function logout(){
        $this->operator->logout();
        redirect('');
    }
}

?>