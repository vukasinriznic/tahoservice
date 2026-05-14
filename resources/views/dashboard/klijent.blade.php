@extends('layouts.app')

@section('title', 'Klijent Dashboard')

@section('nav-links')
    <a href="{{ route('dashboard.klijent') }}" class="active">Home</a>
    <a href="{{ route('service-requests.create') }}">Zakazivanje servisa</a>
    <a href="{{ route('service-requests.index') }}">Moji servisi</a>
    <a href="{{ route('profile.show') }}">Profil</a>
@endsection

@section('content')
    <div class="page-title">
        Dobrodošli, {{ auth()->user()->name }} {{ auth()->user()->surname }}
    </div>

    <div class="cards-grid">
        <div class="card">
            <div class="card-header">
                <div>
                    <div class="card-label">Aktivni servisi</div>
                    <div class="card-value">{{ $activeServices }}</div>
                    <div class="card-sub">U toku</div>
                </div>
                <div class="card-icon card-icon-blue">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div>
                    <div class="card-label">Naredni termin</div>
                    @if($nextAppointment)
                        <div class="card-value" style="font-size:20px;">
                            {{ \Carbon\Carbon::parse($nextAppointment->desired_date)->format('d. M Y') }}
                        </div>
                        <div class="card-sub">{{ \Carbon\Carbon::parse($nextAppointment->desired_date)->format('H:i') }}h</div>
                    @else
                        <div class="card-value" style="font-size:18px;color:#888;">—</div>
                        <div class="card-sub">Nema zakazanih</div>
                    @endif
                </div>
                <div class="card-icon card-icon-orange">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div>
                    <div class="card-label">Istorija servisa</div>
                    <div class="card-value">{{ $totalServices }}</div>
                    <div class="card-sub">Ukupno završenih</div>
                </div>
                <div class="card-icon card-icon-green">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                </div>
            </div>
        </div>
    </div>

    <div class="section-title">Poslednji servisi</div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Vozilo</th>
                    <th>Datum</th>
                    <th>Status</th>
                    <th>Akcija</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recentServices as $sr)
                    <tr>
                        <td>{{ $sr->vehicle->brand }} {{ $sr->vehicle->model }} · {{ $sr->vehicle->registration }}</td>
                        <td>{{ \Carbon\Carbon::parse($sr->desired_date)->format('d.m.Y') }}</td>
                        <td>
                            @php
                                $badge = match($sr->status) {
                                    'zakazano'       => 'badge-blue',
                                    'zavrsena_dijagnostika'=> 'badge-orange',
                                    'u_popravci'     => 'badge-red',
                                    'zavrseno'       => 'badge-green',
                                    default          => 'badge-blue',
                                };
                                $label = match($sr->status) {
                                    'zakazano'       => 'Zakazano',
                                    'zavrsena_dijagnostika' => 'Zavrsena dijagnostika',
                                    'u_popravci'     => 'U popravci',
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
                        <td colspan="4" style="text-align:center;color:#888;padding:32px;">
                            Nemate servisa. <a href="{{ route('service-requests.create') }}" style="color:#1A73E8;font-weight:600;">Zakaži prvi →</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection