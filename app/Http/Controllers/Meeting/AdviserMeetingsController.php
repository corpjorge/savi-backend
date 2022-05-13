<?php

namespace App\Http\Controllers\Meeting;

class AdviserMeetingsController
{
    public function __invoke()
    {
        return \App\Models\Meetings::where('admin_id', auth()->id())->where('state', 'active')->get()->load('user', 'admin', 'service');
    }

}
