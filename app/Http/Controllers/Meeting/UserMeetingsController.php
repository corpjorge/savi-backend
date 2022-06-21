<?php

namespace App\Http\Controllers\Meeting;

class UserMeetingsController
{
    public function __invoke()
    {
        $meeting = \App\Models\Meetings::where('user_id', auth()->id())->where('state', 'active')->first();
        return $meeting ? $meeting->load('user', 'admin') : null;
    }

}
