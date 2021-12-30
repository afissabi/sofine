<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    private $_user = "m_user";

    public function rules()
    {
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_user, ["id_pegawai" => $id])->row();
    }

    public function getUserId($id){

        $this->db->select('*');
        $this->db->from('m_user');
        $this->db->join('m_pegawai','m_user.id_pegawai = m_pegawai.id');
        $this->db->where('m_user.id_role',4);
        $this->db->where('m_user.id_pegawai', $id);
        $this->db->where('m_user.status', 1);
        return $this->db->get()->row();
    }
}

