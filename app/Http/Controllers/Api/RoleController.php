<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Http\Resources\RoleResource;
use App\Repositories\RoleRepository;

class RoleController extends Controller
{
    protected $role;

    public function __construct(RoleRepository $role)
    {
        $this->role = $role;
    }

    public function index()
    {
        $data =  $this->role->all();
        return RoleResource::collection($data);
    }

    public function create(RoleRequest $request)
    {
        return  $this->role->create($request->validated());
    }

    public function destroy($id)
    {
        return $this->role->destroy($id);
    }
}
