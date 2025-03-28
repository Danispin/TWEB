<?php
class Database {
    private $db;

    public function __construct() {
        $this->db = new SQLite3('users.db');  
        $this->initialize();
    }

    private function initialize() {
        $this->db->exec("CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username TEXT UNIQUE NOT NULL,
            password TEXT NOT NULL
        )");
    }

    public function getDB() {
        return $this->db;
    }
}


$database = new Database();
?>
