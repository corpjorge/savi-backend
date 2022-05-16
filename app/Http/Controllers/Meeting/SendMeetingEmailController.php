<?php

namespace App\Http\Controllers\Meeting;

class SendMeetingEmailController
{
    public function __invoke(\App\Models\Meetings $meetings): void
    {
        \Illuminate\Support\Facades\Mail::to(auth()->user()->email)
            ->cc($meetings->admin->email)
            ->send(new \App\Http\Controllers\Meeting\Mails\MeetingCreated($meetings));
    }
}
