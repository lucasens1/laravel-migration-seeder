@extends('layouts.app')

@section('content')
    <h1 class="text-center my-4">Lista Viaggi in treno in partenza oggi :</h1>
    {{-- Tabella viaggio --}}
    <table class="table p-2">
        <thead class="text-center">
            <tr class="fst-italic">
                <th scope="col">Azienda</th>
                <th scope="col">Codice Treno</th>
                <th scope="col">Numero Carrozze</th>
                <th scope="col">Orario di Partenza</th>
                <th scope="col">Orario di arrivo</th>
                <th scope="col">Stazione di Partenza</th>
                <th scope="col">Stazione di Arrivo</th>
                <th scope="col">Disponibilità</th>
                <th scope="col">In Orario</th>
                <th scope="col">Partenza odierna</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($trains as $train_info)
            {{-- Controllo che i treni partano oggi --}}
                @if (date('Y-m-d', strtotime($train_info->partenza_odierna)) === date('Y-m-d'))
                    <tr>
                        <td>{{ $train_info->azienda }}</td>
                        <td>{{ $train_info->codice_treno }}</td>
                        <td>{{ $train_info->numero_carrozze }}</td>
                        <td>{{ $train_info->orario_partenza }}</td>
                        <td>{{ $train_info->stazione_partenza }}</td>
                        <td>{{ $train_info->orario_arrivo }}</td>
                        <td>{{ $train_info->stazione_arrivo }}</td>
                        <td class="{{ ($train_info->cancellato) ? 'table-warning' : 'table-info'}}">{{ $train_info->cancellato ? 'Non disponibile' : 'Disponibile' }}</td>
                        <td class="{{ ($train_info->in_orario) ? 'table-success' : 'table-danger'}}">{{ $train_info->in_orario ? 'In orario' : 'In ritardo' }}</td>
                        <td>{{ $train_info->partenza_odierna }}</td>
                    </tr>
                @endif
              {{-- Lista vuota? --}}
            @empty
                <h2>Nessun Treno Disponibile</h2>
            @endforelse
        </tbody>
    </table>
@endsection
