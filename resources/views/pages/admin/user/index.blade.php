@extends('layouts.app_layout')
@section('title', 'Users Listing')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Users</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <p class="card-text">this is demo</p>
                <div class="table-responsive">
                    <table class="table table-lg">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>E-MAIL ADDRESS</th>
                                <th>CREATED AT</th>
                                <th>UPDATED AT</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="text-bold-500">{{ $user->id }}</td>
                                    <td class="text-bold-500">{{ $user->name }}</td>
                                    <td class="text-bold-500">{{ $user->email }}</td>
                                    <td class="text-bold-500">
                                        {{ $user->created_at ? $user->created_at->diffForHumans() : '' }}
                                    </td>
                                    <td class="text-bold-500">
                                        {{ $user->updated_at ? $user->updated_at->diffForHumans() : '' }}
                                    </td>
                                    <td class="text-bold-500">
                                        <a href="{{ route('admin.user.edit', ['user' => $user]) }}"
                                            class="btn btn-primary rounded-pill">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        var element = document.getElementById('user');
        element.className += " active";
        element.lastElementChild.className += " active";
        document.getElementById('user_index').className += " active";
    </script>
@endpush
