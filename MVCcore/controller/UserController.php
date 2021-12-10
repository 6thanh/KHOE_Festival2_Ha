<?php
namespace controller\UserController;

use model\User\User;

include '../model/User.php';

class UserController
{
    public $user_id;
    public $search;

    public function setSearch($search)
    {
        $this->search = $search;
    }

    public function getSearch()
    {
        return $this->search;
    }

    public function setId($user_id){
        $this->user_id = $user_id;
    }

    public function getId(){
        return $this->user_id;
    }

    public function showDatabase(){
        $User = new User();
        return $User->selectUser();
    }

    public function getUser(){
        $User=new User();
        $User->setId($this->user_id);
        return $User->getById();
    }

    public function delete(){
        $User=new User();
        $User->setId($this->user_id);
        $User->getById();
        $User->deleteUser();
    }

    public function add(){
        $User=new User();
        $User->setName($_POST['name']);
        $User->setGender($_POST['gender']);
        $User->setEmail($_POST['email']);
        $User->setTel($_POST['tel']);
        $User->setPassword($_POST['password']);
        $User->setStopUsing($_POST['stop_using']);
        $User->insertUser();
    }

    public function search(){
        $User=new User();
        $User->setSearch($this->search);
        return $User->searchUser();
    }

    public function update(){
        $User=new User();
        $User->setId($this->user_id);
        $User->setName($_POST['name']);
        $User->setGender($_POST['gender']);
        $User->setEmail($_POST['email']);
        $User->setTel($_POST['tel']);
        $User->setPassword($_POST['password']);
        $User->setStopUsing($_POST['stop_using']);
        $User->updateUser();
    }
}
