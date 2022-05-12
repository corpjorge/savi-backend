<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasApiTokens, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'document',
        'first_name',
        'second_name',
        'last_name',
        'second_last_name',
        'email',
        'password',
        'phone',
        'office_id',
        'area',
        'role_id',
        'image'
    ];
    protected $appends = ['penalized', 'name'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function offices()
    {
        return $this->belongsToMany(Office::class, 'office_adviser');
    }

    public function isAdmin(): bool
    {
        return $this->role_id <= 1;
    }

    public function isAdviser(): bool
    {
        return $this->role_id <= 3;
    }

    public function isCoordinator(): bool
    {
        return $this->role_id <= 2;
    }

    public function meetings()
    {
        return $this->hasMany(Meetings::class, 'admin_id', 'id');
    }

    public function activeMeetings()
    {
        return $this->meetings()->where('status_id', 1)
            ->orWhere('status_id', 3)
            ->orWhere('status_id', 4);
    }

    public function penalties(): HasMany
    {
        return $this->hasMany(Penalty::class, 'user_id', 'id');
    }

    public function activePenalties()
    {
        return $this->penalties()->whereRelation('status', 'name', 'active');
    }

    public function getPenalizedAttribute()
    {
        if ($this->activePenalties()->count() > 0) {
            return true;
        }
        return false;
    }

}
