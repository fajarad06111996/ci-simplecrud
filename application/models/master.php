<?php

class Master extends CI_Model{

    public function tampil(){
        $a = $this->db->query("SELECT * FROM tb_data");
        return $a->result();
    }

    public function tambah($data){
        $a = $this->db->insert('tb_data', $data);
        return $a;
    }

    public function tampilubah($id){
        $a = $this->db->query("SELECT * FROM tb_data WHERE id='$id'");
        return $a->result();
    }

    public function prosesubah($id, $data){
        $this->db->where('id', $id);
        $this->db->update('tb_data', $data);
        return true;
    }

    public function hapus($id){
        $a = $this->db->query("DELETE FROM tb_data WHERE id='$id'");
        return $a;
    }

}