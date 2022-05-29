<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admins;

class Response extends Model
{
    use HasFactory;

    protected $table = 'response';

    protected $fillable = ['review_id', 'admin_id', 'content'];
    
    public function admins() { 
      return $this->belongsTo(Admins::class);
    }
}
