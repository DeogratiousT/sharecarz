@if ($user->active_account == true)
    <span class="badge badge-success badge-pill">Active</span>
@else  
    <span class="badge badge-danger badge-pill">Blocked</span>
@endif