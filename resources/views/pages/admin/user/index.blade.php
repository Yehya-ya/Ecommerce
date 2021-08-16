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
                            <th>USERNAME</th>
                            <th>E-MAIL ADDRESS</th>
                            <th>FIRST NAME</th>
                            <th>LAST NAME</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-bold-500">{{ $user->id }}</td>
                                <td class="text-bold-500">{{ $user->username }}</td>
                                <td class="text-bold-500">{{ $user->email }}</td>
                                <td class="text-bold-500">{{ $user->fname }}</td>
                                <td class="text-bold-500">{{ $user->surname }}</td>
                                <td class="text-bold-500">
                                    <div class="d-flex d-inline">
                                        <div class="form-check form-switch p-0 py-2 m-0">
                                            <input class="form-check-input m-2" type="checkbox"
                                                onchange="toggleCheckbox(this, {{ $user->id }})" @if ($user->is_active) checked @endif>
                                        </div>
                                        <a href="{{ route('admin.user.edit', ['user' => $user]) }}"
                                            class="btn btn-primary rounded-pill m-2">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('admin.user.destroy', ['user' => $user]) }}"
                                            method="post" class="m-2">
                                            @method("delete")
                                            @csrf
                                            <button type="submit" class="btn btn-danger rounded-pill">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </div>
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
    function toggleCheckbox(checkbox, id) {
        axios({
                method: 'patch',
                url: '/admin/user/toggle/' + id,
                data: {
                    value: checkbox.checked,
                }
            }).then(function(response) {
                // handle success
                console.log(response.data);
            })
            .catch(function(error) {
                // handle error
                console.log(error);
            })
            .then(function() {
                // always executed
            });
    }
</script>
<script>
    var element = document.getElementById('user');
    element.className += " active";
    element.lastElementChild.className += " active";
    document.getElementById('user_index').className += " active";
</script>
@endpush
