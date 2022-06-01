<?php

namespace App\Http\Controllers\Meeting;

class MeetingsDay
{
    public function __invoke($date)
    {
        $date = \Carbon\Carbon::parse($date); // 2022-05-03
        return \App\Models\Meetings::where('state', 'active')->whereDate('date', $date)->get(['admin_id', 'date']);
    }

}
