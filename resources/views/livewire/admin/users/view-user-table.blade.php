<div class="table-responsive">
    <table class="table table-sm table-bordered table-condensed table-striped">
        <thead>
            <tr>
                <th>Sl</th>
                <th>Role</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $key => $user)
                <tr>
                    <td>{{ $users->firstItem() + $key }}</td>
                    <td>
                        @foreach ($user->getRoleNames() as $role)
                            {{ $role }}
                        @endforeach
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a title="Edit" href="{{ route('admin.users.edit', ['user_id' => $user->id]) }}"
                            class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                        @can('Delete User')
                            <button class="btn btn-sm btn-danger" onclick="deleteItem({{ $user->id }})"><i
                                    class="fa fa-trash"></i></button>
                        @endcan
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No records!!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $users->links() }}
</div>
