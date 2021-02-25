<a href="{{ route('users.edit', $user) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="View User"> <i class="mdi mdi-square-edit-outline"></i></a>

@if ($user->role->slug !== 'administrator')
    
    @if ($user->active_account == true)
        <a href="{{ route('users.destroy', $user) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Disable Account" onclick="event.preventDefault();document.getElementById('disable-user-form_{{ $user->id }}').submit();"> <i class="mdi mdi-account-off text-danger"></i></a>
        <form id="disable-user-form_{{ $user->id }}" action="{{ route('users.destroy', $user) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    @else
        <a href="{{ route('users.destroy', $user) }}" class="action-icon" data-toggle="tooltip" data-placement="bottom" title="Enable Account" onclick="event.preventDefault();document.getElementById('enable-user-form_{{ $user->id }}').submit();"> <i class="mdi mdi-account-off text-success"></i></a>
        <form id="enable-user-form_{{ $user->id }}" action="{{ route('users.destroy', $user) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    @endif
    
@endif