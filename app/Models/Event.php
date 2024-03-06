<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
        'category',
        'available_seats',
        // Ajoutez d'autres champs ici si nécessaire
    ];

    public function organisateur()
    {
        return $this->belongsTo(User::class);
    }
}
