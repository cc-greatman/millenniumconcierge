@if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Something went wrong!</strong>
        <p style="color: white;">{{ session()->get('error') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
