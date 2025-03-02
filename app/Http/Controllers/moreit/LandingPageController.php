<?php

namespace App\Http\Controllers\moreit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LandingPage;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    public function index()
    {
        $landingPages = LandingPage::select(
            'landingpage.*', // Toutes les colonnes de la table landingpage
            DB::raw('COALESCE(v.total_prospects, 0) as total_prospects') // Récupère le total_prospects depuis la vue
        )
            ->leftJoin('v_landingpage_prospect as v', 'landingpage.id', '=', 'v.landingpage_id') // Jointure avec la vue
            ->where('landingpage.IsDeleted', 0)
            ->get();

        return view('content.moreit.landing_pages.index', compact('landingPages'));
    }
}
