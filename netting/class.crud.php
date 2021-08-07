<?php
require_once 'dbconfig.php';
class crud
{
    private $db;
    private $dbhost = DBHOST;
    private $dbuser = DBUSER;
    private $dbpass = DBPWD;
    private $dbname = DBNAME;
    function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=' . $this->dbhost . ';dbname=' . $this->dbname . ';charset=utf8', $this->dbuser, $this->dbpass);
        } catch (PDOException $e) {
            die("Connection is Faild: " . $e->getMessage());
        }
    }

    public function addValue($array)
    {
        $values = implode(",", array_map(function ($item) {
            return $item . '=?';
        }, array_keys($array)));
        return $values;
    }

    public function read($table)
    {
        try {
            $read = $this->db->prepare("SELECT * FROM $table");
            $read->execute();
            return $read;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function insert($table, $values)
    {
        try {
            $insert = $this->db->prepare("INSERT INTO $table SET {$this->addValue($values)}");
            $insert->execute(array_values($values));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function delete($table, $columns, $values)
    {
        try {
            $delete = $this->db->prepare("DELETE FROM $table WHERE $columns=?");
            $delete->execute([htmlspecialchars($values)]);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
