<?php

namespace App\Http\Controllers\moreit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prospect;

class ProspectController extends Controller
{
    public function index()
    {
        $prospects = Prospect::with('landingPage')->get(); // Récupérer les prospects avec leur landing page associée

        return view('content.moreit.prospects.index', compact('prospects'));
    }
}
