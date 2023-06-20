@extends('master')
@section('content')
    <div class="container mt-3">
        <h3 class="my-3">Authors</h3>
        <div class="row">
            <div class="col-lg-4">
                <form action="{{ route('store_author') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="textname" value="{{ old('textname') }}" class="form-control" placeholder="Enter Name">
                        @error('textname')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea class="form-control" name="textdesc" value="{{ old('textdesc') }}" cols="30" rows="5" placeholder="Description"></textarea>
                        @error('textdesc')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Photo</label>
                        <input type="file" name="photo" class="form-control">
                        @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary form-control">Add New</button>
                </form>
            </div>
            <div class="col-lg-8">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr align="center">
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($authors as $author)
                        <tr>
                            <td align="center">
                                <img src="{{ asset('uploads/'.$author->photo) }}" width="100px" alt="">
                            </td>
                            <td>{{ $author->name }}</td>
                            <td>{{ $author->bio }}</td>
                            <td align="center">
                                <a href="{{ route('edit_author', $author->id) }}" class="btn btn-primary btn-sm">edit</a>
                                <a href="{{ route('delete_author', $author->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')">delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
