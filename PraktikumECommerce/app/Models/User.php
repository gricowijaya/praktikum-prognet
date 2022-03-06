<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
          if(empty($model->{$model->getKeyName()})) {
              $model->{$model->getKeyName()} = Str::uuid();
              $model->status = 'active';
          }
        });

        VerifyEmail::toMailUsing(function ($notifiable, $url)
        { 
            return (new MailMessage)
              ->subject('Verify Email Address')
              ->line('Please click the button below to verify your email address')
              ->action('Verify Email Address', $url);
        });
    }

    public function routeNotificationForMail($notification)
    {
        return [$this->email => $this->name];
    }

    public function product_reviews() { 
      return $this->hasMany(ProductReviews::class);
    }
    
    public function carts() { 
      return $this->hasMany(carts::class);
    }
    
    public function user_notification() {
      return $this->hasMany(UserNotifications::class);
    }

    public function transactions() {
      return $this->hasMany(Transactions::class);
    }
}
