<?php

namespace App\Http\Controllers\Meeting;

use App\Models\Meetings;
use Carbon\Carbon;
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

    }

    public function activeMeetings()
    {
        return Meetings::where('user_id', auth()->id())->where('state', 'active')->exists();
    }

    public function validateDate($date): bool
    {
        return date("Y-m-d") > $date;
    }

    public function validateSunday($date): bool
    {
        return $this->getCarbon($date)->isoFormat('E') == 7;
    }

    public function validateSaturday($date): bool
    {
        return $this->getCarbon($date)->isoFormat('E') == 6 && $this->getCarbon($date)->hour >= 12;
    }

    public function validateTime($date): bool
    {
        return $this->getCarbon($date)->hour > 17 || $this->getCarbon($date)->hour < 8;
    }

    public function validateTimeAdviser($date)
    {
       // return $this->getCarbon($date)->hour > 17 || $this->getCarbon($date)->hour < 8;
    }

    public function getCarbon($date): Carbon|false
    {
        return Carbon::create($date);
    }


}
