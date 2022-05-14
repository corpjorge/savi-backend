<?php

namespace App\Http\Controllers\Meeting;

use App\Models\Meetings;
use Carbon\Carbon;

trait ValidateMeetings
{
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

    public function validateTimeAdviser($date, $adviser)
    {
        return Meetings::where('admin_id', $adviser)->where('date', $this->getCarbon($date))->exists();
    }

    public function validateBreakTime($date, $id)
    {
        $user = \App\Models\User::find($id);
        foreach ($user->break_time as $break_time) {
            if ($this->getCarbon($date)->hour == $break_time) {
                return true;
            }
        }
    }

    public function getCarbon($date): Carbon|false
    {
        return Carbon::create($date);
    }

}
