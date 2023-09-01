@extends('base.layout')

@section('conteudo')

    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">usuario</th>
            <th scope="col">Descricao</th>
            <th scope="col">Nome do evento</th>
            <th scope="col">Zona</th>
          </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)      
                <tr>
                    <td>{{ $ticket->user_id }}</td>
                    <td>{{ $ticket->description }}</td>
                    <td>{{ $ticket->event_id }}</td>
                    <td>{{ $ticket->zone_id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection