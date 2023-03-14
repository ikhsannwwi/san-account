<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasSlug;

class app extends Model
{
    use HasFactory , HasSlug;

    protected $guarded = ['id'];

    public function account(){
        return $this->hasMany(account::class, 'app_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function slugConfigs(): array
    {
        return [
            'slug' => 'app',
            
        ];
    }
}
