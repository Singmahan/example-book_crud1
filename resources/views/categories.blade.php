@extends('master')
@section('content')
    <div class="container mt-3">
        <h3 class="my-3">Categories</h3>
        <div class="row">
            <div class="col-lg-4">
                <form action="{{ route('store_category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Category Name</label>
                        <input type="text" name="textcategory" class="form-control" placeholder="Enter Category">
                        @error('textcategory')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary form-control">Add New</button>
                </form>
            </div>
            <div class="col-lg-6">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr align="center">
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)
                        <tr>
                            <td>{{ $item->category }}</td>
                            <td align="center">
                                <a href="{{ route('edit_category', $item->id) }}" class="btn btn-primary btn-sm">edit</a>
                                <a href="{{ route('delete_category', $item->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')">delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
