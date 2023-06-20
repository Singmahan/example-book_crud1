@extends('master')
@section('content')
    <div class="container mt-3">
        <form action="{{ route('update_post', $post_detail[0]->id) }}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-6">
                    <h3>Edit Post</h3>
                </div>
            </div>
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" name="title" value="{{ $post_detail[0]->title }}" class="form-control" placeholder="Enter Title">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Detail</label>
                        <textarea class="form-control" name="detail" cols="30" rows="5" placeholder="Enter Detail">{{ $post_detail[0]->description }}</textarea>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label for="" class="form-label">Thumnail</label>
                        <input type="file" name="thumnail" class="form-control">
                        <div class="mt-3">
                            <img src="{{ asset('uploads/posts/'.$post_detail[0]->thumnail) }}" width="200px" alt="">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Author</label>
                        <select name="author" class="form-select">
                            <option selected>Select Author</option>
                            @foreach ($authors as $author)
                            <option value="{{ $author->id }}" @if($post_detail[0]->author_id == $author->id) selected @endif>{{ $author->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <select name="category" class="form-select">
                            <option selected>Select Category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if($post_detail[0]->category_id == $category->id) selected @endif>{{ $category->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Slug</label>
                        <input type="text" name="slug" value="{{ $post_detail[0]->slug }}" class="form-control" placeholder="Enter Slug">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Short Description</label>
                        <textarea class="form-control" name="short_description" cols="30" rows="3" placeholder="Enter Short Description">{{ $post_detail[0]->short_description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary form-control">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
