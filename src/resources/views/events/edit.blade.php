@extends('base.layout')

@section('conteudo')

    <form class="form" action="{{ route('update_event', $event->id) }}" method="POST">
        @csrf
        @method('PUT')

        <h2>Edite o evento</h2>

        <div class="form-group">
            <label for="name">Nome do evento</label>
            <input name="name" type="text" class="form-control" placeholder="Digite aqui:">
          </div>
  
        <div class="form-group">
            <label for="description">Descrição do evento</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
        </div>
        
        <div class="form-group">
            <label for="start">Inicio do evento</label>
            <input name="start" type="datetime-local" class="form-control" id="start">
        </div>

        <div class="form-group">
            <label for="end">Fim do evento</label>
            <input name="end" type="datetime-local" class="form-control">
        </div>

        <div class="form-group">
            <label for="name_place">Nome lugar</label>
            <input name="name_place" type="text" class="form-control" placeholder="Digite aqui:">
        </div>

        <div class="form-group">
            <label for="city">Cidade</label>
            <input name="city" type="text" class="form-control" id="city" placeholder="Digite aqui:">
        </div>

        <div class="form-group">
            <label for="state">Estado</label>
            <input name="state" type="text" class="form-control" id="state" placeholder="Digite aqui:">
        </div>

        <div class="form-group">
            <label for="category_id" >Categoria do evento</label>
            <select class="form-control" name="category_id">
                <option disabled value="">Categoria</option>
                    @foreach ($categories as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
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