<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model
{
    private $_pegawai = "m_pegawai";

    public $id;
    public $id_jabatan;
    public $kode;
    public $nama;
    public $alamat;
    public $is_aktif;

    public function rules()
    {
        return [
            ['field' => 'kode_layanan',
            'label' => 'Kode Layanan',
            'rules' => 'required'],

            ['field' => 'nama_layanan',
            'label' => 'Nama Layanan',
            'rules' => 'required'],
        ];
    }

    public function getAll()
    {
        return $this->db->get_where($this->_pegawai, ["id_jabatan" => 1, "is_aktif" => 1])->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_pegawai, ["id" => $id, "deleted_at" => null])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->product_id = uniqid();
        $this->name = $post["name"];
        $this->price = $post["price"];
        $this->description = $post["description"];
        return $this->db->insert($this->_layanan, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->product_id = $post["id"];
        $this->name = $post["name"];
        $this->price = $post["price"];
        $this->description = $post["description"];
        return $this->db->update($this->_layanan, $this, array('product_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_layanan, array("product_id" => $id));
    }
}