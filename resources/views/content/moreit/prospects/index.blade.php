@extends('layouts/contentNavbarLayout')

@section('title', 'Prospects')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/prospects.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
<script src="{{asset('assets/js/prospects.js')}}"></script>
@endsection

@section('content')
<div class="container">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Administration /</span> Mes Prospects</h4>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Liste des Prospects</h5>
            <div class="d-flex align-items-center">
                <div class="d-flex gap-2">
                    <input type="text" name="search" class="form-control" placeholder="Rechercher..." value="{{ $search ?? '' }}">
                    <button type="button" class="btn btn-primary">
                        <i class="bx bx-search"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="sortable" data-sort="nom">
                            Nom
                            @if($sort === 'nom')
                            <i class="bx bx-{{ $direction === 'asc' ? 'up' : 'down' }}-arrow-alt"></i>
                            @endif
                        </th>
                        <th class="sortable" data-sort="prenom">
                            Prénom
                            @if($sort === 'prenom')
                            <i class="bx bx-{{ $direction === 'asc' ? 'up' : 'down' }}-arrow-alt"></i>
                            @endif
                        </th>
                        <th class="sortable" data-sort="email">
                            Email
                            @if($sort === 'email')
                            <i class="bx bx-{{ $direction === 'asc' ? 'up' : 'down' }}-arrow-alt"></i>
                            @endif
                        </th>
                        <th class="sortable" data-sort="date_enregistrement">
                            Date d'Enregistrement
                            @if($sort === 'date_enregistrement')
                            <i class="bx bx-{{ $direction === 'asc' ? 'up' : 'down' }}-arrow-alt"></i>
                            @endif
                        </th>
                        <th>Landing Page Source</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($prospects as $prospect)
                    <tr>
                        <td>{{ $prospect->nom }}</td>
                        <td>{{ $prospect->prenom }}</td>
                        <td>{{ $prospect->email }}</td>
                        <td>{{ $prospect->date_enregistrement }}</td>
                        <td>{{ $prospect->landingPage->nom_page ?? 'Non défini' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Aucun prospect trouvé</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-muted">
                    Affichage de {{ $prospects->firstItem() ?? 0 }} à {{ $prospects->lastItem() ?? 0 }} sur {{ $prospects->total() }} prospects
                </div>
                <div>
                    {{ $prospects->appends(['search' => $search, 'sort' => $sort, 'direction' => $direction])->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection