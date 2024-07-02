<?php
namespace App\Repositories\Admin;

interface AdminRepoInterface
{

    public function getVehicles();
    public function findVehicle($id);
    public function createVehicle(array $data);
    public function editVehicle($id, array $data);
    public function deleteVehicle($id);
    public function toggleResult($id);
    public function findResult($id);
    public function deleteResult($id);
    public function editResult($id, array $data);
    public function addResult(array $data);
    public function getReleasedResults();
    public function deleteAdmission($id);
    public function findAdmission($id);
    public function getAdmissions();
    public function beginAdmission(array $data);
    public function resetAdmissions($id);
    public function closeAdmission($id);

    public function createRole(array $data);
    public function deleteRole($id);
    public function findRole($id);
    public function editRole($id, array $data);

    public function createPermission(array $data);
    public function deletePermission($id);
    public function findPermission($id);
    public function editPermission($id, array $data);

    public function getPermissions();
    public function getRoles();
    public function assignPermissions(array $permissions, $name);
    public function assignPermission($role, array $permissions);
    public function revokePermission($role, array $permission);

    public function getMappings($name);
    public function assignRoleToUser($id, $role);
    public function getClasses();
    public function getWings();
    public function addStudentApplication(array $data);
    public function deleteStudentApplication($id);
    public function showApplications();
    public function getApplicationSession();

    public function getComplaints();

    public function findComplaint($id);

    public function editComplaint($id, array $data);

    public function createComplaint($id);

    public function deleteComplaint($id);

    public function getStudentsRecord(int $student_id);

}

