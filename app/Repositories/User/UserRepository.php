<?php
namespace App\Repositories\User;

use App\Models\User;
// use App\Models\Scopes\SchoolScope;
use App\Repositories\User\UserRepoInterface;


Class  UserRepository implements UserRepoInterface
{
    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }


    /**
     * returns all users
     *
     * @return void
     */
    public function getUsers(){
        return User::bySchool()->get();
    }

    /**
     * returns a user based on id
     *
     * @param integer $id
     * @return void
     */
    public function getUserById(int $id){
        return User::bySchool()->find($id);
    }

    /**
     * creats new row in users table
     *
     * @param array $data
     * @return void
     */
    public function add(array $data){
        return User::bySchool()->create($data);
    }

    /**
     * returns users that are guardians
     *
     * @return void
     */
    public function getGuardians(){
        return User::bySchool()->where('type', 'guardian')->get();
    }

}
