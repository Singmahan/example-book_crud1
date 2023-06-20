@extends('master')
@section('content')
    <div class="container mt-3">
        <h3 class="my-3">Edit Authors</h3>
        <div class="row">
            <div class="col-lg-4">
                <form action="{{ route('update_author', $author_detail[0]->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="textname" value="{{ $author_detail[0]->name }}" class="form-control" placeholder="Enter Name">
                        @error('textname')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea class="form-control" name="textdesc" cols="30" rows="5" placeholder="Description">{{ $author_detail[0]->bio }}</textarea>
                        @error('textdesc')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <img src="{{ asset('uploads/'.$author_detail[0]->photo) }}" width="200px" alt=""><br>
                        {{-- <label for="" class="form-label">Photo</label> --}}
                        <input type="file" name="photo" class="form-control mt-3">
                        @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary form-control">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
