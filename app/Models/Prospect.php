<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    use HasFactory;

    protected $table = 'prospect';

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'landingpage_id',
        'date_enregistrement'
    ];

    public function landingPage()
    {
        return $this->belongsTo(LandingPage::class, 'landingpage_id');
    }
}
