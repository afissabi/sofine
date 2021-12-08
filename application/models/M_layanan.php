<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_layanan extends CI_Model
{
    private $_layanan = "m_layanan";

    public $id_layanan;
    public $kode_layanan;
    public $nama_layanan;
    public $keterangan;
    public $waktu_layanan;

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
        return $this->db->get($this->_layanan)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_layanan, ["id_layanan" => $id])->row();
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