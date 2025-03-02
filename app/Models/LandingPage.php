<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    use HasFactory;

    protected $table = 'landingpage';

    protected $fillable = [
        'nom_page',
        'cadeau_nom',
        'type',
        'cadeau_path',
        'email_html',
        'IsDeleted'
    ];
}
