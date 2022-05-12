<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'description', 'automatic'];
    protected $casts = [
        'automatic' => 'boolean',
    ];

    public function next()
    {
        // get next Service
        return Service::where('id', '>', $this->id)->orderBy('id', 'asc')->first();

    }

    public function previous()
    {
        // get previous  Service
        return Service::where('id', '<', $this->id)->orderBy('id', 'desc')->first();

    }

    public function meetings()
    {
        return $this->hasMany(Meetings::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
