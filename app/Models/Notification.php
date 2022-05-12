<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['meeting_id', 'type'];

    public function meetings()
    {
        $this->belongsTo(Meetings::class);
    }
}
