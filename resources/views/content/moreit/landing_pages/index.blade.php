@extends('layouts/contentNavbarLayout')

@section('title', 'Landing Pages')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
<div class="container">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Administration /</span> Mes Landing Pages</h4>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Liste des Landing Pages</h5>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Cadeau</th>
                        <th>Type</th>
                        <th>Lien</th>
                        <th>Prospects</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($landingPages as $page)
                    <tr>
                        <td>{{ $page->nom_page }}</td>
                        <td>{{ $page->cadeau_nom }}</td>
                        <td>{{ ucfirst($page->type) }}</td>
                        <td>
                            <a href="https://gift.more-it-cs.com/{{ $page->nom_page }}" target="_blank">{{ $page->nom_page }}</a>
                        </td>
                        <td>{{ $page->total_prospects }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary">Modifier</a>
                            <a href="#" class="btn btn-sm btn-danger">Supprimer</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection