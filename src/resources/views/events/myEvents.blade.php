@extends('base.layout')

@section('conteudo')
@foreach($events as $event)  
  <h2>Meus eventos criados</h2>
  <div class="card {{ $event->end < now() ? 'cancelled' : '' }}">
    <div class="card-body">
      <h2 class="card-title">{{ $event->name }}</h2>
      <p class="card-text">{{ $event->description }}</p>
      <p class="card-text">{{ $event->city }} / {{ $event->state }}</p>
      <p class="card-text">Data: {{ $event->start }}</p>
      <p class="card-text">Local: {{ $event->name_place }}</p>

      <div class="card-buttons">
        <a href="{{ route('edit_event', $event->id) }}" class="card-link">Editar</a>
        <a href="{{ route('destroy_event', $event->id) }}" class="card-link">Excluir</a>
      </div>
    </div>
  </div>
@endforeach

<style>
.card {
  margin: 90px 50px 60px 50px;
  background-color: #cdcdcd;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.cancelled {
  background-color: #ddd;
  /* Opacidade para tornar mais cinza */
  opacity: 0.7;
}

.card-body {
  padding: 20px;
}

.card-title {
  font-size: 24px;
  margin-bottom: 10px;
}

.card-text {
  font-size: 18px;
  margin-bottom: 10px;
}

.card-buttons {
    display: flex;
    justify-content: flex-end;
}

.card-link {
  display: inline-block;
  margin-right: 10px;
  color: #007bff;
}

</style>
@endsection
