<?php

namespace App\Repositories;

use App\Models\Role;

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
        $currentRole = $this->role->create($data);
        $currentRole->permissions()->sync($permissions);
        return true;
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
