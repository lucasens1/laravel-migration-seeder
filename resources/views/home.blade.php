@extends('layouts.app')

@section('content')
    <h1 class="text-center my-4">Lista Viaggi in treno in partenza oggi :</h1>
    {{-- Tabella viaggio --}}
    <table class="table">
        <thead>
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
            @foreach ($trains as $train_info)
            <tr>
                <td>{{ $train_info->azienda }}</td>
                <td>{{ $train_info->codice_treno }}</td>
                <td>{{ $train_info->numero_carrozze }}</td>
                <td>{{ $train_info->orario_partenza }}</td>
                <td>{{ $train_info->stazione_partenza }}</td>
                <td>{{ $train_info->orario_arrivo }}</td>
                <td>{{ $train_info->stazione_arrivo }}</td>
                <td>{{ ($train_info->cancellato) ? 'Non disponibile' : 'Disponibile' }}</td>
                <td>{{ ($train_info->in_orario) ? 'In orario' : 'In ritardo' }}</td>
                <td>{{ $train_info->partenza_odierna }}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
@endsection