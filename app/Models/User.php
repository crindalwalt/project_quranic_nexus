<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Billable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone'
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function review()
    {
        return $this->hasMany(ProductReviews::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function address()
    {
        return $this->hasMany(UserAddress::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function enrollment()
    {
        return $this->hasMany(Enrollment::class);
    }


    public function enrolled_in()
    {
        return $this->hasMany(CourseStudent::class);
    }

    public function badge_teacher(){
        return $this->hasMany(Badge::class);
    }

    public function enrolled_in_class(){
        return $this->hasMany(BadgeStudents::class);
    }
}