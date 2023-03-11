<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Commentaires;
use App\Models\Bien;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [ 'titre', 'description', 'nom_usager','email_usager', 'nom_statut','commentaire','statut','id_biens','date_statut','date_saisie'];

    //Un ticket concerne obligatoirement un bien.
    public function bien(){
        return $this->belongsTo(Bien::class);
    }


    public function commentaires()
    {
        return $this->hasMany(Commentaires::class);
    }
}
