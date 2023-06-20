@extends('master')
@section('content')
    <div class="container mt-3">
        <h3>Welcome to Dashboard</h3>
        <div class="row my-5">
            <div class="col-lg-4 my-3">
                <div class="card">
                    <div class="card-body">
                        <h4>Total Post: <h2>{{ $total_posts }}</h2></h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 my-3">
                <div class="card">
                    <div class="card-body">
                        <h4>Total Author: <h2>{{ $total_authors }}</h2> </h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 my-3">
                <div class="card">
                    <div class="card-body">
                        <h4>Total Category: <h2>{{ $total_category }}</h2> </h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 my-3">
                <div class="card">
                    <div class="card-body">
                        <h4>Total Trash: <h2>{{ $total_trash_post }}</h2> </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
