<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">User Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="destroyUser">
                    <div class="modal-body">
                        <h6>Are you sure want to delete?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Yes, Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin">
            @include('layouts.includes.admin.breadcrumb', [
                'icon' => 'mdi-view-list',
                'title' => 'User',
                'functions' => [
                    [
                        'icon' => 'mdi-plus',
                        'route' => route('admin.user.create'),
                    ]
                ]
            ])
        </div>
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <span class="fs-5">List</span>
                    <span class="float-end">{{ $users->total() ?? 0 }} users</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Avatar</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            <img src="{{ asset($item->avatar) }}" alt="">
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->getRoleNames()->implode(',') }}</td>
                                        <td>
                                            @if ($item->status)
                                                <label class="badge bg-success">Active</label>
                                            @else
                                                <label class="badge bg-danger">InActive</label>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.user.edit', $item->id) }}" class="btn btn-inverse-success btn-fw btn-sm">
                                                <span class="mdi mdi-pencil"></span>
                                            </a>
                                            <a href="#" wire:click="deleteUser({{$item->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-inverse-danger btn-fwb btn-sm">
                                                <span class="mdi mdi-trash-can"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3 ">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
