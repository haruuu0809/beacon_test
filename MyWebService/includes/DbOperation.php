<?php

class DbOperation
{
    private $conn;

    //Constructor
    function __construct()
    {
        require_once dirname(__FILE__) . '/Config.php';
        require_once dirname(__FILE__) . '/DbConnect.php';
        $db = new DbConnect();
        $this->conn = $db->connect();
    }

    public function createTeam($name, $memberCount)
    {
        $stmt = $this->conn->prepare("INSERT INTO team(name, member) values(?, ?)");
        $stmt->bind_param("si", $name, $memberCount);
        $result = $stmt->execute();
        $stmt->close();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

}
?>
