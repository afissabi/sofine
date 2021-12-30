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
}
