@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('tags.create') }}" class="btn btn-success mb-2 ">
            Add Tags
        </a>
    
    </div>
    
    <div class="card card-default">
        <div class="card-header">Tags</div>

        <div class="card-body">
            @if ($tags->count() > 0)
            <table class="table">

                <thead>
                    <th>Name</th>
                    <th>Posts count</th>
                    <th></th>
                </thead>

                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->name }}</td>
                            <td>
                                {{ $tag->post->count() }}
                            </td>
                            <td>
                                <a href="{{ route('tags.edit',$tag->id) }}" class="btn btn-info btn-sm">
                                    Edit
                                </a>
                                <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $tag->id }})">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <form action="" method="POST" id="deleteTagForm"> <!-- action="tags" -->
                @csrf
                @method('DELETE')

                <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Tag</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center text-bold">Are you sure, you want to delete tag ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Go Back</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </div>
                    </div>
                </div>
            </form>
            
            @else
                <h4 class="text-center">Opss! No Tags found</h4>
            @endif
            
            </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script>
        function handleDelete(id)
        {
            var form = document.getElementById('deleteTagForm');
            form.action = '/tags/' + id;
            $('#deleteModal').modal('show');
        }
    </script>

    
@endsection