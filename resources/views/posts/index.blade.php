@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('posts.create') }}" class="btn btn-success mb-2 ">
            Add Post
        </a>
    </div>

    <div class="card card-default">
        <div class="card-header">
            Posts
        </div>

        <div class="card-body">
           @if ($posts->count() > 0)
            <table class="table">
                <thead>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td><img src="{{ 'storage/'.$post->image }}" width="100" height="80" alt=""></td>
                            
                            <td>{{ $post->title }}</td>

                            <td>
                                <a href="{{ route('categories.edit',$post->category->id) }}">
                                    {{ $post->category->name }}
                                </a>
                            </td>

                            <td>
                                @if ($post->trashed())
                                <form action="{{ route('restore-post',$post->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success btn-sm">Restore</button>
                                </form>
                                @else
                                    <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-info btn-sm">Edit</a>
                                @endif

                                <form action="{{ route('posts.destroy',$post->id) }}" method="POST" class="d-inline">

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        {{ $post->trashed() ? 'Delete' : 'Trash' }}
                                    </button>

                                </form>
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