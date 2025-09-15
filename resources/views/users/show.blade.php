@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>User Details</h4>
                        <div>
                            @if (Auth::user()->isSuperUser())
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm">Edit</a>
                            @endif
                            <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm">Back to Users</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="text-muted">Personal Information</h6>
                                <table class="table table-borderless">
                                    <tr>
                                        <td><strong>ID:</strong></td>
                                        <td>{{ $user->id }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Name:</strong></td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email:</strong></td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Status:</strong></td>
                                        <td>
                                            <span class="badge {{ $user->is_active ? 'bg-success' : 'bg-danger' }}">
                                                {{ $user->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h6 class="text-muted">Role Information</h6>
                                <div class="mb-3">
                                    <strong>Assigned Roles:</strong><br>
                                    @forelse($user->roles as $role)
                                        <span class="badge bg-primary me-1">{{ $role->display_name }}</span>
                                    @empty
                                        <span class="text-muted">No roles assigned</span>
                                    @endforelse
                                </div>

                                <div class="mb-3">
                                    <strong>Permissions:</strong><br>
                                    @if ($user->isSuperUser())
                                        <span class="badge bg-success">Full System Access</span>
                                    @elseif($user->isViewer())
                                        <span class="badge bg-info">Read Only Access</span>
                                    @else
                                        <span class="text-muted">Limited Access</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="text-muted">Account Information</h6>
                                <table class="table table-borderless">
                                    <tr>
                                        <td><strong>Created:</strong></td>
                                        <td>{{ $user->created_at->format('F d, Y \a\t g:i A') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Last Updated:</strong></td>
                                        <td>{{ $user->updated_at->format('F d, Y \a\t g:i A') }}</td>
                                    </tr>
                                    @if ($user->email_verified_at)
                                        <tr>
                                            <td><strong>Email Verified:</strong></td>
                                            <td>{{ $user->email_verified_at->format('F d, Y \a\t g:i A') }}</td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
