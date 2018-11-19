<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper(['url']);
        $this->load->library(['form_validation','session']);
        $this->load->model('operator_model','operator',true);
        $this->load->model('kritik_model','kritik',true);
        $this->load->model('kegiatan_model','kegiatan',true);
        $this->load->model('gallery_model','gallery',true);
        $login = $this->session->userdata('login');
        if(!$login){
            redirect('login');
        }
    }

    public function index(){
        $beranda = true; $kegiatan = false; $gallery = false; $kritik = false;
        $header = 'operator/header';
        $content = 'operator/beranda';
        $footer = 'operator/footer';
        $kritiks = $this->kritik->getKritik();
        $kegiatans = $this->kegiatan->getKegiatan();
        $gallerys = $this->gallery->getGallery();
        $this->load->view('template',compact('header','content','footer','kegiatan','beranda','gallery','kritik','kritiks','kegiatans','gallerys'));
    }

    public function kegiatan(){
        $beranda = false; $kegiatan = true; $gallery = false; $kritik = false;
        $header = 'operator/header';
        $content = 'operator/kegiatan';
        $footer = 'operator/footer';
        $kegiatans = $this->kegiatan->getKegiatan();
        $this->load->view('template',compact('header','content','footer','kegiatan','beranda','gallery','kritik','kegiatan','kegiatans'));
    }

    public function createKegiatan(){
        $beranda = false; $kegiatan = true; $gallery = false; $kritik = false;
        $header = 'operator/header';
        $content = 'operator/form_kegiatan';
        $footer = 'operator/footer';
        $action = 'operator/kegiatan/tambah';
        $title = 'Tambah';

        if(!$_POST){
            $data = (object) $this->kegiatan->getDefaultValues();
        }else{
            $data = (object) $this->input->post();
            $data->id_operator = $this->session->userdata('id');
        }

        if(!$this->kegiatan->validate()){
            $this->load->view('template',compact('header','content','footer','kegiatan','beranda','gallery','kritik','data','action','title'));
            return;
        }

        $config['upload_path'] = './assets/img/kegiatan';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 3000;
        $this->load->library('upload', $config);

        if($this->upload->do_upload('foto')){
            $upload_data = $this->upload->data();
            $featured_image = base_url("assets/img/kegiatan").$upload_data['file_name'];
            $data->foto = $upload_data['file_name'];
            $this->kegiatan->insertKegiatan($data);    
            $this->session->set_flashdata('berhasil','Data Kegiatan Berhasil Ditambahkan');
            redirect('operator/kegiatan');
        } else{
            $error =  $this->upload->display_errors('<span class="text-danger" style="font-size:14px">','</span>');
            $this->load->view('template',compact('header','content','footer','kegiatan','beranda','title','gallery','kritik','data','error','action'));
        }
    }

    public function editKegiatan($id = null){
        $beranda = false; $kegiatan = true; $gallery = false; $kritik = false;
        $header = 'operator/header';
        $content = 'operator/form_kegiatan';
        $footer = 'operator/footer';
        $action = 'operator/kegiatan/edit/'.$id;
        $title = 'Edit';

        $kegiatans = $this->kegiatan->getKegiatanById($id);

        if(!$kegiatans) redirect('operator/kegiatan');

        if(!$_POST){
            $data = (object) $kegiatans;
        }else{
            $data = (object) $this->input->post();
            $data->id_operator = $this->session->userdata('id');
        }

        if(!$this->kegiatan->validate()){
            $this->load->view('template',compact('header','content','footer','kegiatan','beranda','gallery','kritik','data','action','title'));
            return;
        }

        $config['upload_path'] = './assets/img/kegiatan';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 3000;
        $this->load->library('upload', $config);

        if($this->upload->do_upload('foto')){
            $upload_data = $this->upload->data();
            $featured_image = base_url("assets/img/kegiatan").$upload_data['file_name'];
            $data->foto = $upload_data['file_name'];
        } else{
            $data->foto = $kegiatans->foto;
        }

        $this->kegiatan->updateKegiatan($id,$data);
        $this->session->set_flashdata('berhasil','Data Kegiatan Berhasil Diubah');
        redirect('operator/kegiatan');
    }

    public function deleteKegiatan(){
        $id = $this->input->post('id');
        $this->kegiatan->deleteKegiatan($id);
        $this->session->set_flashdata('berhasil','Data Kegiatan Berhasil Dihapus');
        redirect('operator/kegiatan');
    }

    public function gallery(){
        $beranda = false; $kegiatan = false; $gallery = true; $kritik = false;
        $header = 'operator/header';
        $content = 'operator/gallery';
        $footer = 'operator/footer';
        $gallerys = $this->gallery->getGallery();
        $this->load->view('template',compact('header','content','footer','kegiatan','beranda','gallery','kritik','gallerys'));
    }

    public function createGallery(){
        $beranda = false; $kegiatan = false; $gallery = true; $kritik = false;
        $header = 'operator/header';
        $content = 'operator/form_gallery';
        $footer = 'operator/footer';
        $action = 'operator/gallery/tambah';
        $title = 'Tambah';

        if(!$_POST){
            $data = (object) $this->gallery->getDefaultValues();
        }else{
            $data = (object) $this->input->post();
            $data->id_operator = $this->session->userdata('id');
        }

        if(!$this->gallery->validate()){
            $this->load->view('template',compact('header','content','footer','kegiatan','beranda','gallery','kritik','data','action','title'));
            return;
        }

        $config['upload_path'] = './assets/img/gallery';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 3000;
        $this->load->library('upload', $config);

        if($this->upload->do_upload('foto')){
            $upload_data = $this->upload->data();
            $featured_image = base_url("assets/img/gallery").$upload_data['file_name'];
            $data->foto = $upload_data['file_name'];
            $this->gallery->insertGallery($data);    
            $this->session->set_flashdata('berhasil','Data Gallery Berhasil Ditambahkan');
            redirect('operator/gallery');
        } else{
            $error =  $this->upload->display_errors('<span class="text-danger" style="font-size:14px">','</span>');
            $this->load->view('template',compact('header','content','footer','kegiatan','beranda','title','gallery','kritik','data','error','action'));
        }
    }

    public function editGallery($id = null){
        $beranda = false; $kegiatan = false; $gallery = true; $kritik = false;
        $header = 'operator/header';
        $content = 'operator/form_gallery';
        $footer = 'operator/footer';
        $action = 'operator/gallery/edit/'.$id;
        $title = 'Edit';

        $gallerys = $this->gallery->getGalleryById($id);

        if(!$gallerys) redirect('operator/gallery');

        if(!$_POST){
            $data = (object) $gallerys;
        }else{
            $data = (object) $this->input->post();
            $data->id_operator = $this->session->userdata('id');
        }

        if(!$this->gallery->validate()){
            $this->load->view('template',compact('header','content','footer','kegiatan','beranda','gallery','kritik','data','action','title'));
            return;
        }

        $config['upload_path'] = './assets/img/gallery';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 3000;
        $this->load->library('upload', $config);

        if($this->upload->do_upload('foto')){
            $upload_data = $this->upload->data();
            $featured_image = base_url("assets/img/gallery").$upload_data['file_name'];
            $data->foto = $upload_data['file_name'];
        } else{
            $data->foto = $gallerys->foto;
        }

        $this->gallery->updateGallery($id,$data);
        $this->session->set_flashdata('berhasil','Data Gallery Berhasil Diubah');
        redirect('operator/gallery');
    }

    public function deletegallery(){
        $id = $this->input->post('id');
        $this->gallery->deleteGallery($id);
        $this->session->set_flashdata('berhasil','Data Gallery Berhasil Dihapus');
        redirect('operator/gallery');
    }

    public function kritik(){
        $beranda = false; $kegiatan = false; $gallery = false; $kritik = true;
        $header = 'operator/header';
        $content = 'operator/kritik';
        $footer = 'operator/footer';
        $kritiks = $this->kritik->getKritik();
        $this->load->view('template',compact('header','content','footer','kegiatan','beranda','gallery','kritik','kritiks'));
    }

    public function deleteKritik(){
        $id = $this->input->post('id');
        $this->kritik->deleteKritik($id);
        redirect('operator');
    }

    public function laporan(){
        $kritiks = $this->kritik->getKritik();
        $kegiatans = $this->kegiatan->getKegiatan();
        $gallerys = $this->gallery->getGallery();
        $html = $this->load->view('operator/laporan',compact('kritiks','kegiatans','gallerys'),true);

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan_".date('Y_m_d').".pdf";
        $this->pdf->load_view('operator/laporan', $html);

    }
}
?>