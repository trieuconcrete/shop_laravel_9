@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        @include('layouts.includes.admin.breadcrumb', [
            'icon' => 'mdi-view-list',
            'title' => 'Category',
            'functions' => [
                [
                    'icon' => 'mdi-view-list',
                    'route' => route('admin.user.index')
                ]
            ]
        ])
    </div>
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header">
                <h3>Create</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.user.update', $user) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3 form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $user->name }}" required autocomplete="name" autofocus/>
                            @error('name') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}" required autocomplete="email"/>
                            @error('email') <small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="avatar">Avatar</label>
                            <input type="file" name="avatar" class="form-control mb-3" />
                            <x-image :path="$user->avatar" :width="60" :height="60" />
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="form-check-label">
                                Status
                            </label>
                            <input type="checkbox" name="status" value="1" class="form-check-input" {{ $user->status == 1 ? 'checked' : '' }} />
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="role">Roles</label>
                            <select name="role" class="form-control form-control-sm">
                                <option value=""></option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ in_array($role->name, $user->getRoleNames()->toArray()) ? 'selected' : null }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-3 form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection