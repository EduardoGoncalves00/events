@extends('base.layout')

@section('conteudo')

    <form class="form" action="{{ route('update_zone', $zone->id) }}" method="POST">
        @csrf
        @method('PUT')

        <h2>Edite a zona de um evento</h2>

        <div class="form-group">
          <label for="name">Nome da zona</label>
          <input name="name" type="text" class="form-control" placeholder="Digite aqui:">
        </div>

        <div class="form-group">
            <label for="value">Valor</label>
            <input name="value" type="number" class="form-control" placeholder="Digite aqui:">
        </div>

        <div class="form-group">
            <label for="description">Descrição da zona</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="capacity">Capacidade de publico</label>
            <input name="capacity" type="number" class="form-control" placeholder="Digite aqui:">
        </div>

        <div class="form-group">
            <label for="bought">Valor</label>
            <input name="bought" type="number" class="form-control" placeholder="Digite aqui:">
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