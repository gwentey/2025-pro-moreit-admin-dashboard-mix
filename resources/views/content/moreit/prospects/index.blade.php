@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

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
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Administration /</span> Mes Prospects</h4>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Liste des Prospects</h5>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Date d'Enregistrement</th>
                        <th>Landing Page Source</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prospects as $prospect)
                    <tr>
                        <td>{{ $prospect->nom }}</td>
                        <td>{{ $prospect->prenom }}</td>
                        <td>{{ $prospect->email }}</td>
                        <td>{{ $prospect->date_enregistrement }}</td>
                        <td>{{ $prospect->landingPage->nom_page ?? 'Non défini' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection