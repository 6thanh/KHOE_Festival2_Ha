<?php
namespace model\User;

use PDO;
use PDOException;

class User
{
    public $user_id;
    public $user_name;
    public $user_gender;
    public $user_email;
    public $user_tel;
    public $user_password;
    public $stop_using;
    public $search;
    public $conn;
    
    function setId($user_id)
    {
        $this->user_id = $user_id;
    }

    function getId()
    {
        return $this->user_id;
    }

    function setName($user_name)
    {
        $this->user_name = $user_name;
    }

    function getName()
    {
        return $this->user_name;
    }

    function setGender($user_gender)
    {
        $this->user_gender = $user_gender;
    }

    function getGender()
    {
        return $this->user_gender;
    }

    function setEmail($user_email)
    {
        $this->user_email = $user_email;
    }

    function getEmail()
    {
        return $this->user_email;
    }

    function setTel($user_tel)
    {
        $this->user_tel = $user_tel;
    }

    function getTel()
    {
        return $this->user_tel;
    }

    function setPassword($user_password)
    {
        $this->user_password = $user_password;
    }

    function getPassword()
    {
        return $this->user_password;
    }

    function setStopUsing($stop_using)
    {
        $this->stop_using = $stop_using;
    }

    function getStopUsing()
    {
        return $this->stop_using;
    }

    function setSearch($search)
    {
        $this->search = $search;
    }

    function getSearch()
    {
        return $this->search;
    }

    function connectToDatabase()
    {
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "yii2training_ha";

        try {
            $conn = new PDO("mysql:host=" . $host . ";dbname=" . $dbname . ";charset=utf8", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    function insertUser()
    {
        $this->conn = $this->connectToDatabase();
        $sql = "INSERT INTO `useryii2`(`user_name`,`user_gender`,`user_email`,`user_tel`,`user_password`,`stop_using`,`created_at`) 
                  VALUES (:username,:gender,:email,:tel,:pass,:stopUsing,:created)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $this->user_name);
        $stmt->bindParam(':gender', $this->user_gender);
        $stmt->bindParam(':email', $this->user_email);
        $stmt->bindParam(':tel', $this->user_tel);
        $stmt->bindParam(':pass', $this->user_password);
        $stmt->bindParam(':stopUsing', $this->stop_using);
        $stmt->bindParam(':created', $created);
        $created = date('d/m/Y H:i');
        $stmt->execute();
    }

    function updateUser()
    {
        $this->conn = $this->connectToDatabase();
        $sql = "UPDATE `useryii2` SET user_name='" . $this->user_name
            . "',user_gender='" . $this->user_gender
            . "',user_email='" . $this->user_email
            . "',user_tel='" . $this->user_tel
            . "',user_password='" . $this->user_password
            . "',stop_using='" . $this->stop_using
            . "',updated_at='" . date('d/m/Y H:i')
            . "' WHERE user_id= '" . $this->user_id . "'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    function deleteUser()
    {
        $this->conn = $this->connectToDatabase();
        $sql = "DELETE FROM useryii2 WHERE user_id='" . $this->user_id . "'";
        $this->conn->exec($sql);
    }

    function getById()
    {
        $this->conn = $this->connectToDatabase();
        $sql = "SELECT * FROM `useryii2` WHERE `user_id`=" . $this->user_id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function searchUser()
    {
        // find by name / email / tel
        $this->conn = $this->connectToDatabase();
        $sql = "SELECT * FROM `useryii2` WHERE `user_name` like '%$this->search%' 
            OR  `user_email` like '%$this->search%' OR `user_tel` like '%$this->search%'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function selectUser()
    {
        $this->conn = $this->connectToDatabase();
        $sql = "SELECT * FROM `useryii2`";
        $query = $this->conn->prepare($sql);
        $query->execute();
        $row = array();
        while ($kq = $query->fetch(PDO::FETCH_ASSOC)) {
            array_push($row, $kq);
        }
        return $row;
    }
}
