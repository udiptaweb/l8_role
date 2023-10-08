<?php

namespace App\Http\Livewire\Admin\RolePermission;

use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionsTable extends Component
{
    protected $listeners = ['permissionUpdated', 'removePermission'];

    public function removePermission($data)
    {
        try {
            $role_id = $data['role_id'];
            $permission_id = $data['permission_id'];
            $role = Role::find($role_id);
            $permission = Permission::find($permission_id);
            $role->revokePermissionTo($permission);
            $this->emit('success', 'Permission removed successfully.');
        } catch (\Throwable $th) {
            Log::error($th);
            $this->emit('failed', 'Something went wrong. Please try again later.');
        }
    }
    public function permissionUpdated()
    {
    }
    public function render()
    {
        $roles = Role::all();
        return view('livewire.admin.role-permission.role-permissions-table', [
            'roles' => $roles
        ]);
    }
}
