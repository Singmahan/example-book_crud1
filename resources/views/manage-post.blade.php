@extends('master')
@section('content')
<div class="container mt-3">
    <h3 class="my-3">All Post</h3>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr align="center">
                        <th>Thumnall</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Posting Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td align="center">
                            <img src="{{ asset('uploads/posts/'.$post->thumnail) }}" width="100px" alt="">
                        </td>
                        <td>{{ $post->title }}</td>
                        <td align="center">{{ $post->rAuthor->name }}</td>
                        <td align="center">{{ $post->rCategory->category }}</td>
                        <td align="center">{{ $post->created_at->format('d F, Y') }}</td>
                        <td align="center">
                            <a href="{{ route('edit_post', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{ route('trash_post', $post->id) }}" class="btn btn-warning btn-sm">trash</a>
                            {{-- <a href="{{ route('delete_post', $post->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete ?')">Delete</a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
