<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description', 'image', 'price', 'location', 'country', 'user_id'
    ];
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    

}
