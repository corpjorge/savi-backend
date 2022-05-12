<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Meetings extends Model
{
    use HasFactory;

    protected $appends = ['isActive', 'scheduled', 'dateHuman', 'withMeeting', 'isCancellable'];

    public function getIsActiveAttribute()
    {
        $status = match ($this->status_id) {
            1, 3, 4 => true,
            default => false,
        };
        if ($status) {
            $start = Carbon::parse($this->date)->subMinutes(5);
            $end = Carbon::parse($this->date)->addMinutes(60);
            if (Carbon::now()->between($start, $end)) {
                return true;
            }
        }
        return false;
    }

    public function getIsCancellableAttribute()
    {
        if ($this->isActive) {
            $start = Carbon::parse($this->date)->subMinutes(60);
            if (Carbon::now()->lt($start)) {
                return true;
            }
        }
        return false;
    }

    public function getWithMeetingAttribute()
    {
        $status = match ($this->status_id) {
            1, 3, 4 => true,
            default => false,
        };

        if ($status) {
            $now = Carbon::now();
            $end = Carbon::parse($this->date)->addMinutes(60);
            if ($now->lt($end)) {
                return true;
            }
        }
        return false;
    }

    //TODO: validar si se borra
    public function getScheduledAttribute()
    {
        if ($this->status == 'active') {
            $date = Carbon::create($this->date)->subMinutes(30);
            if ($date->gt(Carbon::now())) {
                return true;
            }
        }
        return false;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class, 'meeting_id');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function penalty()
    {
        return $this->hasOne(Penalty::class);
    }
}
