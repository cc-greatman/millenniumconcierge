@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p style="color: white;">{{ session()->get('success') }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
