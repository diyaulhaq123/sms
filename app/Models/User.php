<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Scopes\SchoolScope;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'phone'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->password = Hash::make('password123');
        });
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
    * @param Builder $builder
    * @return void
    */
    public function scopeBySchool(Builder $builder): void
    {
        $builder->where('school_id', auth()->user()->school_id);
    }

    /**
     * Get the user associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function staff(): HasOne
    {
        return $this->hasOne(Staff::class, 'user_id', 'id');
    }

    public function routeNotificationForNexmo(){
        return $this->email;
    }

    /**
     * Get the profile associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }

}
