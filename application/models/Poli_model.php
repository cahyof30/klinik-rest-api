<?php

class Poli_model extends CI_Model
{
    public function getPoli($id = null)
    {
        if ($id === null) {
            return $this->db->get('poli')->result_array();
        } else {
            return $this->db->get_where('poli', ['id' => $id])->result_array();
        }
    }

    public function deletePoli($id)
    {
        $this->db->delete('poli', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createPoli($data)
    {
        $this->db->insert('poli', $data);
        return $this->db->affected_rows();
    }

    public function updatePoli($data, $id)
    {
        $this->db->update('poli', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
