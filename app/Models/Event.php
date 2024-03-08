<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
        'category_id', 
        'available_seats',
        'user_id',
    ];

    public function organisateur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
