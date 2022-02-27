<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin_Notification;
use App\Models\Response;

class Admins extends Model
{
    use HasFactory;
    protected $table = 'admins';

    public function admin_notifications() {
      return $this->hasMany(Admin_Notification::class);
    }

    public function response() {
      return $this->hasMany(Response::class);
    }
} 
