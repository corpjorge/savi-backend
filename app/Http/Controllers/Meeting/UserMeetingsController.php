<?php

namespace App\Http\Controllers\Meeting;

class UserMeetingsController
{
    public function __invoke()
    {
        return \App\Models\Meetings::where('user_id', auth()->id())->where('state', 'active')->first()->load('user', 'admin', 'service');
    }

}
