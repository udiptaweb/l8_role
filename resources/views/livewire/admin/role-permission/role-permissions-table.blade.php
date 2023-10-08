<div class="table-responsive">
    <div class="row mb-2">

    </div>
    <table wire:loading.class="loading" class="table table-sm table-bordered table-condensed table-striped">
        <thead>
            <tr>
                <th>Sl</th>
                <th>Role</th>
                <th>Permissions</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($roles as $key => $role)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        @foreach ($role->permissions as $permission)
                            <button class="btn btn-sm btn-primary"
                                onclick="removePermission({{ $role->id }},{{ $permission->id }})"
                               >{{ $permission->name }}</button>
                        @endforeach
                    </td>
                    <td class="no-wrap">
                        <button
                            wire:click="$emitTo('admin.role-permission.role-permissions-add-form','setRoleId',{{ $role->id }})"
                            class="btn btn-sm btn-primary" data-toggle="modal"
                            data-target="#add_new_permission_to_role" >Add Permission</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No records!!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
