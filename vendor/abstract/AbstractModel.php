<?php

namespace model;

use vendor\DB;

abstract class AbstractModel
{
    protected DB $db;
    protected string $tableName;
    
    public function __construct(DB $db, string $tableName)
    {
        $this->db = $db;
        $this->tableName = $tableName;
    }
    
    
    public function getAll(): array
    {
        $sql = "SELECT * FROM {$this->tableName}";
        return $this->db->selectQuery($sql);
    }
    
    public function getById($id): array|null
    {
        $id = $this->db->escapeString($id);
        $sql = "SELECT * FROM {$this->tableName} WHERE id = $id";
        $result = $this->db->selectQuery($sql);
        return $result[0] ?? null;
    }
    
    public function add($data): int|string
    {
        foreach ($data as $key => $value) {
            $data[$key] = $this->db->escapeString($value);
        }
        
        $fields = implode(', ', array_keys($data));
        $values = "'" . implode("', '", $data) . "'";
        
        $sql = "INSERT INTO {$this->tableName} ($fields) VALUES ($values)";
        return $this->db->insertQuery($sql);
    }
    
    
    public function update($id, $data): int|string
    {
        foreach ($data as $key => $value) {
            $data[$key] = $this->db->escapeString($value);
        }
        
        $id = $this->db->escapeString($id);
        $sets = [];
        foreach ($data as $field => $value) {
            $sets[] = "$field = '$value'";
        }
        
        $sql = "UPDATE {$this->tableName} SET " . implode(', ', $sets) . " WHERE id = $id";
        return $this->db->updateQuery($sql);
    }
    
    public function delete($id): int|string
    {
        $id = $this->db->escapeString($id);
        $sql = "DELETE FROM {$this->tableName} WHERE id = $id";
        return $this->db->deleteQuery($sql);
    }
}
