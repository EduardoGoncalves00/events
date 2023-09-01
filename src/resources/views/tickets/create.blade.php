@extends('base.layout')

@section('conteudo')

    <form class="form" action="{{ route('store_ticket') }}" method="POST">
        @csrf
        @method('POST')

        <h2>Crie um ticket</h2>

        <div class="form-group">
            <label for="description">Descrição do ticket</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="event_id" >Evento</label>
            <select class="form-control" name="event_id">
                <option disabled value="">Evento</option>
                    @foreach ($events as $event)
                        <option value="{{ $event->id }}">{{ $event->name }}</option>
                    @endforeach
            </select>  
        </div>

        <div class="form-group">
            <label for="zone_id" >Zona do evento</label>
            <select class="form-control" name="zone_id">
                <option disabled value="">Zona</option>
                    @foreach ($zones as $zone)
                        <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                    @endforeach
            </select>  
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </form>
    
    <style>
        .form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 40px;
            }

        .label {
            display: flex;
            align-items: center;
        }

        .label .input {
            display: flex;
            width: 210px;
            margin-top: 20px;
        }

        .label .button {
            display: flex;
            margin-top: 20px;
        }
    </style>
@endsection