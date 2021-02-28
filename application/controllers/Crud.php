<?php

class Crud extends CI_Controller{

    function __construct(){
        parent::__construct();

        $this->load->model('master');
    }


    public function index(){
        $data['tampil'] = $this->master->tampil();
        $this->load->view('tampil', $data);
    }
    
    public function tambah(){
        $this->load->view('tambah');
    }

    public function prosestambah(){
        $nama   = $this->input->post('nama');
        $alamat = $this->input->post('alamat'); 

        $data = array(
                'nama' => $nama,
                'alamat'=> $alamat
        );

        $sikat = $this->master->tambah($data);

        if($sikat){
            echo 'Data berhasil ditambah <a href='.base_url('index.php').'>kembali</a>';
        }else{
            echo 'Gagal tambah data';
        }
    }

    public function tampilubah($id){
        $data['tampilubah'] = $this->master->tampilubah($id);
        $this->load->view('ubah', $data);
    }

    public function simpanubah($id){
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');

        $data = array(
                'nama' => $nama,
                'alamat' => $alamat
        );

        $sikat = $this->master->prosesubah($id, $data);

        if($sikat){
            echo 'Data berhasil diupdate <a href='.base_url('index.php').'>kembali</a>';
        }else{
            echo 'Gagal update data';
        }
    }

    public function hapus($id){
        $sikat = $this->master->hapus($id);
        if($sikat){
            echo 'Data berhasil dihapus <a href='.base_url('index.php').'>kembali</a>';
        }else{
            echo 'Gagal dihapus data';
        }
    }

}