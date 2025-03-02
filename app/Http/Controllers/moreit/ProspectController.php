<?php

namespace App\Http\Controllers\moreit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prospect;

class ProspectController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'date_enregistrement');
        $direction = $request->input('direction', 'desc');
        $perPage = 30;

        $query = Prospect::with('landingPage');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nom', 'LIKE', "%{$search}%")
                    ->orWhere('prenom', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }

        $prospects = $query->orderBy($sort, $direction)
            ->paginate($perPage)
            ->withQueryString();

        return view('content.moreit.prospects.index', compact('prospects', 'search', 'sort', 'direction'));
    }
}
