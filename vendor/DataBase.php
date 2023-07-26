<?php

namespace vendor;

class DataBase
{
    private \mysqli $connection;
    
    public function __construct(string $host, string $dbname, string $username, string $password)
    {
        $this->connection = mysqli_connect($host, $username, $password, $dbname);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }
    
    public function executeQuery(string $sql): void
    {
        $this->connection->query($sql);
    }
    
    public function selectQuery(string $sql): array
    {
        $result = $this->connection->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function insertQuery(string $sql): int|string
    {
        $this->connection->query($sql);
        return $this->connection->insert_id;
    }
    
    public function updateQuery(string $sql): int|string
    {
        $this->connection->query($sql);
        return $this->connection->affected_rows;
    }
    
    public function deleteQuery(string $sql): int|string
    {
        $this->connection->query($sql);
        return $this->connection->affected_rows;
    }
    
    public function escapeString(string $value): string
    {
        return $this->connection->real_escape_string($value);
    }
    
    public function closeConnection(): bool
    {
        return $this->connection->close();
    }
}