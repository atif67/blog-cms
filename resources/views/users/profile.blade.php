@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card-body">
                    @include('partials.errors')
                   <form action="{{ route('users.update-profile') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $users->name }}">
                        </div>
                        <div class="form-group">
                            <label for="abut">About Me</label>
                            <textarea name="about" id="about" rows="4" class="form-control">{{ $users->about }}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-md">Update Me</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
