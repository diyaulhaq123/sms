<?php
namespace App\Repositories\Staff;

interface StaffRepoInterface{


    public function getActiveStaffFormat();

    public function makeStaffId();

    public function getStaffs();

    public function getAll();

    public function getById($id);

    public function getBytype($type);

    public function countStaff();

    public function create(array $data);

    public function update($id,array $data);

    public function delete($ids);

    public function addAvatar($id, array $data);

}
