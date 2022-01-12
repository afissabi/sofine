<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_pesan_blash extends CI_Model
{
    private $_pesan = "m_pesan_blash";
    
    public function getPesan()
    {
        return $this->db->get_where($this->_pesan, ["id" => 4, "type" => "personal2", "deleted_at" => null])->row();
    }}