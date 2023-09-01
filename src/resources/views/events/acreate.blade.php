@extends('base.layout')

@section('conteudo')

<form class="form" action="{{ route('store_event') }}" method="POST">
    @csrf
    @method('POST')

    <h2>Crie um evento</h2>

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
        <button type="submit" class="btn btn-primary">Criar evento</button>
    </div>
</form>
    
<style>
.form {
max-width: 800px;
margin: 0 auto;
}

.form h2 {
text-align: center;
margin-bottom: 30px;
}

.form label {
font-weight: bold;
display: block;
margin-bottom: 10px;
}

.form input[type="text"],
.form textarea,
.form input[type="datetime-local"],
.form select {
width: 100%;
padding: 12px;
border: 1px solid #ccc;
border-radius: 4px;
box-sizing: border-box;
margin-bottom: 20px;
font-size: 16px;
}

.form input[type="text"]:focus,
.form textarea:focus,
.form input[type="datetime-local"]:focus,
.form select:focus {
border-color: #2a2a72;
outline: none;
}

.form button {
background-color: #2a2a72;
color: #fff;
padding: 12px 20px;
border: none;
border-radius: 4px;
cursor: pointer;
font-size: 16px;
}

.form button:hover {
background-color: #444;
}

.table {
width: 100%;
border-collapse: collapse;
margin-top: 30px;
}

.table th,
.table td {
padding: 12px;
text-align: left;
border-bottom: 1px solid #ddd;
}

.table th {
background-color: #f2f2f2;
font-weight: bold;
}

.table td a {
color: #2a2a72;
text-decoration: none;
}

.table td a:hover {
text-decoration: underline;
}

</style>
@endsection