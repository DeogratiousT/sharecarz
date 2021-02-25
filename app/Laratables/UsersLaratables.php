<?php

namespace App\Laratables;

class UsersLaratables
{
    public static function laratablesCustomState($user)
    {
        return view('users.index_state', compact('user'))->render();
    }

    public static function laratablesCustomAction($user)
    {
        return view('users.index_action', compact('user'))->render();
    }

    public static function laratablesAdditionalColumns()
    {
        return ['active_account'];
    }
}