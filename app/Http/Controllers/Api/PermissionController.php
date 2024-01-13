<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Http\Resources\PermissionResource;
use App\Repositories\PermissionRepository;

class PermissionController extends Controller
{
    protected $permission;

    public function __construct(PermissionRepository $permission)
    {
        $this->permission = $permission;
    }

    public function index()
    {
        $data =  $this->permission->all();
        return PermissionResource::collection($data);
    }

    public function create(PermissionRequest $request)
    {
        return  $this->permission->create($request->validated());
    }

    public function destroy($id)
    {
        return $this->permission->destroy($id);
    }
}
