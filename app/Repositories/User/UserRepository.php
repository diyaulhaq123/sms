<?php
namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\User\UserRepoInterface;


Class  UserRepository implements UserRepoInterface
{
    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }


    public function getUsers(){
        return $this->user->get();
    }

    public function getUserById($id){
        return $this->user->find($id);
    }

    public function add(array $data){
        return $this->user->create($data);
    }

    public function getGuardians(){
        return $this->user->where('type', 'guardian')->get();
    }

}
