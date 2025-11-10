<?php

namespace App\Models;

// Import thêm cho Sanctum và Verify Email
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany; // Import HasMany

class User extends Authenticatable// implements MustVerifyEmail đã được thêm
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        // 'phone_number',
        // 'avatar_url'
    ];

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
    ];

    /**
     * Định nghĩa mối quan hệ 1-nhiều với Model Address.
     */
    public function addresses(): HasMany
    {
        // Giả định bạn đã tạo Model App\Models\Address
        return $this->hasMany(Address::class); 
    }
}