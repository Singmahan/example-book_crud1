<div class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a href="{{ route('dashboard') }}" class="navbar-brand">Laravel CRUD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
                <a class="nav-link" href="{{ route('manage-post') }}">All Post</a>
                <a class="nav-link" href="{{ route('create_post') }}">Create New</a>
                <a class="nav-link" href="{{ route('manage-author') }}">Authors</a>
                <a class="nav-link" href="{{ route('manage-category') }}">Category</a>
                <a class="nav-link" href="{{ route('view_trashed_post') }}">Trash</a>
            </div>
        </div>
    </div>
</div>
