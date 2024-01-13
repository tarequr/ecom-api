<?php

namespace App\Repositories;

use App\Models\Permission;

class PermissionRepository implements PermissionInterface
{
    protected $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function all()
    {
        $this->permission->all();
    }

    public function find($id)
    {
        $this->permission->find($id);
    }

    public function create(array $data)
    {
        $this->permission->create($data);
    }

    public function update(array $data, $id)
    {
        $this->permission->find($id)->update($data);
    }

    public function destroy($id)
    {
        $this->permission->find($id)->destroy();
    }
}
