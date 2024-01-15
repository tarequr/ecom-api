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

    public function create(array $data)
    {
        return $this->role->create($data);
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
