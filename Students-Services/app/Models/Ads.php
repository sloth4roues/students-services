<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;

    protected $fillable = ['users_id', 'title', 'description', 'creation_date', 'status']; // Ajouter 'status'

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function acceptedBy()
    {
        return $this->belongsTo(User::class, 'accepted_by'); // Si tu as un champ 'accepted_by'
    }


}


