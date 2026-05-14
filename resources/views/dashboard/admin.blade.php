@extends('layouts.app')

@section('title', 'Administrator Dashboard')

@section('nav-links')
    <a href="{{ route('dashboard.admin') }}" class="active">Home</a>
    <a href="{{ route('users.index') }}">Korisnici</a>
    <a href="{{ route('parts.index') }}">Zalihe</a>
    <a href="{{ route('service-requests.index') }}">Servisi</a>
    <a href="{{ route('reports.index') }}">Izveštaji</a>
@endsection

@section('content')
    <div class="page-title">
        Dobrodošli, {{ auth()->user()->name }} {{ auth()->user()->surname }}
    </div>

    <div class="cards-grid">
        <div class="card">
            <div class="card-header">
                <div>
                    <div class="card-label">Zakazani servisi</div>
                    <div class="card-value">{{ $scheduledServices }}</div>
                    <div class="card-sub">Čekaju obradu</div>
                </div>
                <div class="card-icon card-icon-orange">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div>
                    <div class="card-label">Obrađeni servisi</div>
                    <div class="card-value">{{ $completedServices }}</div>
                    <div class="card-sub">Ukupno završenih</div>
                </div>
                <div class="card-icon card-icon-green">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div>
                    <div class="card-label">Kritične zalihe</div>
                    <div class="card-value" style="{{ $criticalParts > 0 ? 'color:#D93025;' : '' }}">{{ $criticalParts }}</div>
                    <div class="card-sub">Delovi ispod minimuma</div>
                </div>
                <div class="card-icon {{ $criticalParts > 0 ? 'card-icon-red' : 'card-icon-green' }}">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div>
                    <div class="card-label">Aktivni korisnici</div>
                    <div class="card-value">{{ $activeUsers }}</div>
                    <div class="card-sub">Registrovanih klijenata</div>
                </div>
                <div class="card-icon card-icon-blue">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
            </div>
        </div>
    </div>

    <div class="section-title">Pregled svih servisa</div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Klijent</th>
                    <th>Vozilo</th>
                    <th>Datum</th>
                    <th>Serviser</th>
                    <th>Status</th>
                    <th>Akcija</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($allServices as $sr)
                    <tr>
                        <td>{{ $sr->user->name }} {{ $sr->user->surname }}</td>
                        <td>{{ $sr->vehicle->brand }} {{ $sr->vehicle->model }} · {{ $sr->vehicle->registration }}</td>
                        <td>{{ \Carbon\Carbon::parse($sr->desired_date)->format('d.m.Y') }}</td>
                        <td>{{ $sr->serviser ? $sr->serviser->name . ' ' . $sr->serviser->surname : '—' }}</td>
                        <td>
                            @php
                                $badge = match($sr->status) {
                                    'zakazano'       => 'badge-blue',
                                    'zavrsena_dijagnostika' => 'badge-orange',
                                    'zavrseno'       => 'badge-green',
                                    default          => 'badge-blue',
                                };
                                $label = match($sr->status) {
                                    'zakazano'       => 'Zakazano',
                                    'zavrsena_dijagnostika' => 'Završena dijagnostika',
                                    'zavrseno'       => 'Završena popravka',
                                    default          => $sr->status,
                                };
                            @endphp
                            <span class="badge {{ $badge }}">{{ $label }}</span>
                        </td>
                        <td><a href="{{ route('service-requests.show', $sr) }}" class="btn btn-sm">Detalji</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align:center;color:#888;padding:32px;">
                            Nema servisa.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection