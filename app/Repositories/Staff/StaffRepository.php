<?php
namespace App\Repositories\Staff;

use App\Models\User;
use App\Models\Staff;
use App\Models\Profile;
use App\Models\StaffFormat;
use App\Repositories\Staff\StaffRepoInterface;

Class StaffRepository implements StaffRepoInterface
{
    private Staff $staff;
    private User $user;

    public function __construct(Staff $staff,User $user){
        $this->staff = $staff;
        $this->user = $user;
    }

    public function getActiveStaffFormat(){
        $format = StaffFormat::where('status', 1)->firstOrFail();
        return $format->name;
    }

    public function makeStaffId(){
        $staff = Staff::latest('id')->first();
        $st = explode('/', $staff->staff_id);
        $staf = end($st);
        return $staf+1;
    }

    public function getStaffs(){
        return User::with('staff')->bySchool()->whereIn('type', ['teacher', 'accountant', 'eo'])->get();
    }


    public function getAll(){
        return User::scopeBySchool()->get();
    }

    public function getById($id){
        return User::bySchool()->findOrFail($id);
    }

    public function getBytype($type){
        return User::bySchool()->where('type', $type)->get();
    }

    public function countStaff(){
        return $this->staff->count();
    }


    public function create(array $data){
        return $this->staff->create($data);
    }

    public function update($id,array $data){
        $staff = $this->staff->where('user_id',$id);
        return $this->staff->update($data);
    }

    public function delete($ids){
        $staff = $this->staff->whereIn('user_id', $ids)->get();
        return $staff->delete();
    }

    public function addAvatar($id, $data){
        $avatar = Profile::where('user_id', $id)->firstOrFail();
        return $avatar->update(['avatar' => $data]);
    }


}
