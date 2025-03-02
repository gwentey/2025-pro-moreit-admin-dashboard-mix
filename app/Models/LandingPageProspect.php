<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPageProspect extends Model
{
    use HasFactory;

    protected $table = 'v_landingpage_prospect';

    public $timestamps = false;

    protected $fillable = [
        'landingpage_id',
        'nom_page',
        'cadeau_nom',
        'type',
        'cadeau_path',
        'email_html',
        'IsDeleted',
        'total_prospects'
    ];
}
