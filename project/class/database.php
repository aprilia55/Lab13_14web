<?php

class Database
{
    protected $host = "localhost";
    protected $user = "root";
    protected $pass = "";
    protected $db   = "latihan1"; // ini sudah BENAR dari error kamu

    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->db
        );

        if ($this->conn->connect_error) {
            die("Koneksi database gagal: " . $this->conn->connect_error);
        }
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }
}
