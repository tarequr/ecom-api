<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Log;

class RoleRepository implements RoleInterface
{
    protected $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function all()
    {
        return $this->role->all();
    }

    public function find($id)
    {
        return $this->role->find($id);
    }

    public function create(array $data, $permissions)
    {

        $modifiedPermissions = [];

        // $name = [
        //     1 => ['name' => 'tarequr'],
        //     2 => ['name' => 'tarequr 2'],
        //     3 => ['name' => 'tarequr 3'],
        //     4 => ['name' => 'tarequr 4']
        // ];

        foreach ($permissions as $key => $permission) {
            $permissionName = Permission::find($permission)->pluck('name');

            // Log::info($permission);
            // Log::info([$permission => ['name' => $permissionName || ""]]);
            // return [$permission => ['name' => $permissionName || ""]];
            array_push($modifiedPermissions, [$permission => ['name' => $permissionName]]);
        }




        $outputArray = [];

        foreach ($modifiedPermissions as $subArray) {
            foreach ($subArray as $key => $value) {
                Log::info($value);
return "";
                $outputArray[$key] = $value;
            }
        }



        // array_map($modifiedPermissions, function ($permission){
        //     return [ => $permission];
        // });

        // Log::info($outputArray);
        // Log::info($modifiedPermissions);
        // var_dump($modifiedPermissions);
        // return $modifiedPermissions;

        return $this->role->create($data)->permissions()->attach(
            $outputArray
            // $permissions,
            // ['name' => function($permission){
            //     $per = Permission::find($permission)->select('name');

            //     Log::info($per->name);
            //     return $per->name;
            // }]
        );
    }

    public function update(array $data, $id)
    {
        return $this->role->find($id)->update($data);
    }

    public function destroy($id)
    {
        return $this->role->find($id)->destroy();
    }
}
