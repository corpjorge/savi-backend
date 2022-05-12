<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function next()
    {
        // get next user
        return Category::where('id', '>', $this->id)->orderBy('id', 'asc')->first();

    }

    public function previous()
    {
        // get previous  user
        return Category::where('id', '<', $this->id)->orderBy('id', 'desc')->first();

    }
}
