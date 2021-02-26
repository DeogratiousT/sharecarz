@if(session('success'))
    <div class="alert alert-success my-1 mx-4">
        <br><br>
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger my-1 mx-1">
        <br><br>
        {{session('error')}}
    </div>
@endif