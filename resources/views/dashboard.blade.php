@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <h4>Welcome, {{ $user->name }}!</h4>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Roles:</strong>
                            @foreach ($user->roles as $role)
                                <span class="badge bg-primary">{{ $role->display_name }}</span>
                            @endforeach
                        </p>

                        @if ($user->isSuperUser())
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="card bg-info text-white">
                                        <div class="card-body">
                                            <h5 class="card-title">Total Users</h5>
                                            <h2>{{ $totalUsers }}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card bg-success text-white">
                                        <div class="card-body">
                                            <h5 class="card-title">Quick Actions</h5>
                                            <a href="{{ route('users.create') }}" class="btn btn-light">Add New User</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
