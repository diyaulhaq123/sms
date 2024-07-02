<?php
namespace App\Repositories\User;



 interface UserRepoInterface{


    public function getUsers();
    public function getUserById($id);
    public function add(array $data);

    public function getGuardians();

}
