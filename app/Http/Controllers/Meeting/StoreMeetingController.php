<?php

namespace App\Http\Controllers\Meeting;

use App\Models\Meetings;
use Illuminate\Validation\ValidationException;

class StoreMeetingController
{
    public function __invoke(\Illuminate\Http\Request $request, Meetings $meeting)
    {
        $this->validations($request);

        $request->validate([
            'admin_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date'
        ]);

        $meeting->fill($request->all());
        $meeting->user_id = auth()->user()->id;
        $meeting->state = 'active';
        $meeting->meeting = \Illuminate\Support\Str::random(7);
        $meeting->save();
    }

    public function validations($request)
    {
        if($this->activeMeetings()) {
            throw ValidationException::withMessages([
                'error' => ['A meeting already exists for this user.'],
            ]);
        }

        if($this->validateDate($request->date)) {
            throw ValidationException::withMessages([
                'error' => ['The date is not available.'],
            ]);
        }

    }

    public function activeMeetings()
    {
        return Meetings::where('user_id', auth()->id())->where('state', 'active')->exists();
    }

    public function validateDate($date)
    {
         return date("Y-m-d") > $date;
    }






}
