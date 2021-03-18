@if(session('success'))
    <div class="alert alert-success mx-4 mb-0">
        <br><br>
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger mx-4 mb-0">
        <br><br>
        {{session('error')}}
    </div>
@endif