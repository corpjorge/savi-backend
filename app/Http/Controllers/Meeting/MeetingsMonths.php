<?php

namespace App\Http\Controllers\Meeting;

class MeetingsMonths
{
    public function __invoke($months)
    {
        $date = \Carbon\Carbon::now();
        return \App\Models\Meetings::where('state', 'active')
            ->whereDate('date', '>=', $date->startOfMonth())
            ->whereDate('date', '<=', $date->addMonths($months - 1)->endOfMonth())->get(['admin_id', 'date']);
    }

}
