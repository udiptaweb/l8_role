@extends('layouts.admin')

@section('title')
    Users | View | {{ config('app.name') }}
@endsection

@section('top')
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('plugins/jquery-confirm/jquery-confirm.min.css') }}">
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
                        <li class="breadcrumb-item"><a href="#">Users</a></li>
                        <li class="breadcrumb-item active">View All</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">View Users</h3>
                        </div>
                        @livewire('admin.users.view-user-table')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('bottom')
    @livewireScripts
    <script src="{{ asset('plugins/jquery-confirm/jquery-confirm.min.js') }}"></script>
    <script>
        function deleteItem(id) {
            $.confirm({
                title: 'Confirm!',
                content: 'Please confirm to delete the user',
                buttons: {
                    confirm: {
                        text: 'Confirm',
                        btnClass: 'btn-success',
                        keys: ['enter', 'a'],
                        action: function() {
                            Livewire.emitTo('admin.users.view-user-table', 'deleteItem', id);
                        }
                    },
                    cancel: function() {

                    }
                }
            });
        }
    </script>
    <x-alert></x-alert>
@endsection
