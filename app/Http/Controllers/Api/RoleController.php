<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Traits\ApiResponseTrait;

class RoleController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Role::select(['id', 'name'])->paginate(10)->toArray();
        return $this->successResponse($roles, 'success', 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        //
        $data = $request->validated();
        $role = Role::create($data);
        return $this->successResponse($role, 'success', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
        return response()->json($role->load('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        //
        $data = $request->validated();
        $role->update($data);
        return $this->successResponse($role, 'success', 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
        $role->delete();
        return $this->successResponse(['message' => 'Role deleted'], 'success');
    }

    public function attachUser(Request $request, Role $role)
    {
        $role->users()->attach($request->user_id);
        return $this->successResponse(['message' => 'User attached to role'], 'success');
    }

    public function detachUser(Request $request, Role $role)
    {
        $role->users()->detach($request->user_id);
        return $this->successResponse(['message' => 'User detached from role'], 'success');
    }
}
