<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket;

class Commentaires extends Model
{
    use HasFactory;


    protected $fillable = [
        'nom',
        'commentaire',
        'ticket_id',
        'date_commentaire',

    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
