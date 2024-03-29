<?php

class Group_Model extends CI_Model
{
    protected $table = 'groups';
    protected $primaryKey = 'id';

    public function groups()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        return $this->db->get();
    }

    public function findByPIC()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        return $this->db->get();
    }

    public function findByRoleIbs()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        return $this->db->get();
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function findOne($id)
    {
        return $this->db->get_where($this->table, [$this->primaryKey => $id]);
    }

    public function findIn($id)
    {
        $this->db->from($this->table);
        $this->db->where_in($this->primaryKey, [$id]);
        return $this->db->get();
    }

    public function update($id, $update)
    {
        $this->db->where($this->primaryKey, $id);
        $this->db->update($this->table, $update);
    }
}