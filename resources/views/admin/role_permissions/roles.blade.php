@extends('layouts.admin')

@section('title')
    Roles & Permissions | {{ config('app.name') }}
@endsection

@section('top')
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('admin/plugins/jquery-confirm/jquery-confirm.min.css') }}">
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Admin</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Roles & Permissions</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card border shadow-none">
                        <div class="card-body py-3">
                            @livewire('admin.role-permission.role-permissions-table')
                            <div class="modal fade" id="add_new_permission_to_role" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header py-2 bg-primary text-white">
                                            <h5 class="modal-title" id="exampleModalLabel">Add New Permission</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @livewire('admin.role-permission.role-permissions-add-form')
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('bottom')
    <script src="{{ asset('admin/plugins/jquery-confirm/jquery-confirm.min.js') }}"></script>
    <script>
        function removePermission(role_id, permission_id) {
            $.confirm({
                title: 'Confirm!',
                content: 'Do you want to remove the permission',
                buttons: {
                    confirm: {
                        text: 'Confirm',
                        btnClass: 'btn-danger',
                        keys: ['enter', 'a'],
                        action: function() {
                            Livewire.emitTo('admin.role-permission.role-permissions-table', 'removePermission', {
                                'role_id': role_id,
                                'permission_id': permission_id
                            });
                        }
                    },
                    cancel: function() {

                    }
                }
            });
        }
    </script>
    @livewireScripts
@endsection
