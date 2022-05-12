<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Office extends Model
{
    use HasFactory;

    protected $appends = ['hours', 'hours_range'];

    protected $fillable = ['name', 'check_in_time', 'check_out_time', 'check_in_weekend_time', 'check_out_weekend_time', 'lunch_time', 'lunch_duration_minutes'];

    public function advisers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'office_adviser');
    }

    public function getHoursRangeAttribute(): array
    {
        $week = [
            date('H:i', strtotime($this->check_in_time)) . "-" . date('H:i', strtotime($this->lunch_time)),
            date('H:i', strtotime($this->lunch_time . '+' . $this->lunch_duration_minutes . ' minutes')) . '-' . date('H:i', strtotime($this->check_out_time))];
        return [
            'monday' => $week,
            'tuesday' => $week,
            'wednesday' => $week,
            'thursday' => $week,
            'friday' => $week,
            'saturday' => [date('H:i', strtotime($this->check_in_time)) . "-" . date('H:i', strtotime($this->check_out_weekend_time))],
            'sunday' => [],
        ];
    }


}
