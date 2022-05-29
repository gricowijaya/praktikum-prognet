<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admins;

class Admin_Notification extends Model
{
    use HasFactory;

    protected $table = 'admin_notifications';

    protected $guarded = 'id';
    protected $fillable = [
      'type',
      'notifiable_type',
      'notifiable_id',
      'data'
    ];

    public function admins() { 
      return $this->belongsTo(Admins::class);
    }
}
