<?php defined('BASEPATH') OR exit('No direct script access allowed');

class T_spam extends CI_Model
{
    private $_table = "t_spam";

    public $id_layanan;

    public function rules()
    {
        return [
            ['field' => 'id_layanan',
            'label' => 'id_layanan',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getCountIdMember()
    {
        $this->db->select_max('id_t_spam');
        $this->db->from('t_spam');
        $query = $this->db->get();
        if($query->num_rows() > 0){
           return $query->row('id_t_spam');        
        }else{
           return 1;
        }
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_t_spam" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_layanan = $post["id_layanan"];
        return $this->db->insert($this->_table, $this);
    }

    public function savedokter()
    {
        $post = $this->input->post();
        $this->id_layanan = $post["id_layanan"];
        $this->id_pegawai = $post["id_pegawai"];
        $this->status = 0;
        return $this->db->update($this->_table, $this, array('id_t_spam' => $post['id_spam']));
    }

    public function savejadwal()
    {
        $post = $this->input->post();
        $this->id_layanan = $post["id_layanan"];
        $this->id_pegawai = $post["id_pegawai"];
        $this->tanggal = $post["tanggal"];
        $this->jam = $post["jam"];
        $this->status = 0;
        return $this->db->update($this->_table, $this, array('id_t_spam' => $post['id_spam']));
    }

    public function update()
    {
        $post = $this->input->post();
        $this->product_id = $post["id"];
        $this->name = $post["name"];
        $this->price = $post["price"];
        $this->description = $post["description"];
        return $this->db->update($this->_table, $this, array('product_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("product_id" => $id));
    }
}