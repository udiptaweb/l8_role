<?php

namespace App\Http\Livewire\Admin\RolePermission;

use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionsAddForm extends Component
{
    public $role_id;
    public $permission_id;
    protected $listeners = ['setRoleId'];

    public function setRoleId($id)
    {
        $this->role_id = $id;
    }
    public function store()
    {
        $this->validate([
            'permission_id' => 'required'
        ], [
            'permission_id.required' => 'Please select permission'
        ]);
        try {
            $role = Role::find($this->role_id);
            $permission = Permission::find($this->permission_id);
            $role->givePermissionTo($permission);
            
            $this->emit('success', 'Permission added successfully.');
            $this->emitTo('admin.role-permission.role-permissions-table','permissionUpdated');
        } catch (\Throwable $th) {
            Log::error($th);
            $this->emit('failed', 'Something went wrong. Please try again later.');
        }
    }
    public function render()
    {
        return view('livewire.admin.role-permission.role-permissions-add-form', [
            'permissions' => Permission::all()
        ]);
    }
}
