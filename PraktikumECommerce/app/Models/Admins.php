<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin_Notification;
use App\Models\Response;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admins extends Authenticatable
{
    use HasFactory;
    protected $table = 'admins';

    protected $guard = 'admins';

    protected $fillable = [
      'name', 'email', 'password',
    ];

    protected $hidden = [ 
      'password', 'remember_token',
    ];

    public function admin_notifications() {
      return $this->hasMany(Admin_Notification::class);
    }

    public function response() {
      return $this->hasMany(Response::class);
    }
} 
