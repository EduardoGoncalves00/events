@extends('base.layout')

@section('conteudo')

    <form class="form" action="{{ route('update_category', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <h2>Edite a categoria de um evento</h2>

        <div class="form-group">
          <label for="name">Nome da nova categoria</label>
          <input name="name" type="text" class="form-control" placeholder="Digite aqui:">
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