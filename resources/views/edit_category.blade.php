@extends('master')
@section('content')
    <div class="container mt-3">
        <h3 class="my-3">Edit Category</h3>
        <div class="row">
            <div class="col-lg-4">
                <form action="{{ route('update_category', $category_detail[0]->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Category Name</label>
                        <input type="text" name="textcategory" value="{{ $category_detail[0]->category }}" class="form-control" placeholder="Enter Category">
                        @error('textcategory')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary form-control">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
