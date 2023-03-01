<?php

class database
{
    public $que;
    private $servername = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'farzan';
    private $result = array();
    private $mysqli = '';

    public function __construct()
    {
        $this->mysqli = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }

    public function insert($table, $para = array())
    {
        var_dump($para);
        $table_columns = implode(',', array_keys($para));
        $table_value = implode("','", $para);

        $sql = "INSERT INTO $table($table_columns) VALUES('$table_value')";

        $result = $this->mysqli->query($sql);
    }

    public $sql;

    public function select($table, $rows = "*", $where = null)
    {
        if ($where != null) {
            $sql = "SELECT $rows FROM $table WHERE $where";
        } else {
            $sql = "SELECT $rows FROM $table";
        }

        $this->sql = $result = $this->mysqli->query($sql);
    }
    public function sorttime($table, $rows = "*")
    {


        $sql = "SELECT $rows FROM $table ORDER BY created_at";
        $this->sql = $result = $this->mysqli->query($sql);
    }

    public function sortprice($table, $rows = "*")
    {


        $sql = "SELECT $rows FROM $table ORDER BY price";
        $this->sql = $result = $this->mysqli->query($sql);
    }


    public function selectcolor($table, $rows = "*", $where = null)
    {
        if ($where != null) {
            $sql = "SELECT $rows FROM $table WHERE $where";
        } else {
            $sql = "SELECT DISTINCT color FROM motor_bikes";
        }

        $this->sql = $result = $this->mysqli->query($sql);
    }
    public function __destruct()
    {
        $this->mysqli->close();
    }
}
