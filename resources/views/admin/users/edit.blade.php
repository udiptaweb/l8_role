@extends('layouts.admin')

@section('title')
    Users | Edit | {{ config('app.name') }}
@endsection

@section('top')
    @livewireStyles
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Admin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Users</a></li>
                        <li class="breadcrumb-item active">View All</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Edit User</h3>
                        </div>
                        @livewire('admin.users.edit-user-form', ['user_id' => $user_id])
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('bottom')
    @livewireScripts
    <x-alert></x-alert>
@endsection
