<?php

namespace App\Http\Controllers\Meeting;

use App\Models\Meetings;
use Illuminate\Validation\ValidationException;

class StoreMeetingController
{
    use ValidateMeetings;

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
        if ($this->activeMeetings()) {
            throw ValidationException::withMessages([
                'error' => ['A meeting already exists for this user.'],
            ]);
        }

        if ($this->validateDate($request->date)) {
            throw ValidationException::withMessages([
                'error' => ['The date is not available.'],
            ]);
        }

        if ($this->validateSunday($request->date)) {
            throw ValidationException::withMessages([
                'error' => ['The date is not available.'],
            ]);
        }

        if ($this->validateSaturday($request->date)) {
            throw ValidationException::withMessages([
                'error' => ['The time is not available.'],
            ]);
        }

        if ($this->validateTime($request->date)) {
            throw ValidationException::withMessages([
                'error' => ['The time is not available.'],
            ]);
        }

        if ($this->validateTimeAdviser($request->date, $request->admin_id)) {
            throw ValidationException::withMessages([
                'error' => ['date already used.'],
            ]);
        }

    }


}