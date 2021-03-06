<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use User;

class UserNotifications extends Model
{
    use HasFactory;

    protected $table = 'user_notifications';

    public function users() { 
      return $this->belongsTo(User::class, 'notifiable_id');
    }
}
