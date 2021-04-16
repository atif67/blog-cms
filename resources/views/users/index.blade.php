@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">
            Users
        </div>

        <div class="card-body">
           @if ($users->count() > 0)
            <table class="table">
                <thead>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <img src="{{ Gravatar::src($user->email) }}" width="40px" height="40px" class="rounded-circle">
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            
                            <td>{{ $user->email }}</td>

                            <td>
                                {{ $user->role }}
                            </td>
                            <td>
                                @if (!$user->isAdmin())
                                    <form action="{{ route('user.make-admin',$user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Make Admin</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
           @else
                <h4 class="text-center">Opss! No posts found</h4>
           @endif
        </div>

    </div>
@endsection