@extends('base.layout')

@section('conteudo')
@foreach($events as $event)  
  <div class="card">
    {{-- <img class="card-img" src="{{ $event->image }}" alt="{{ $event->name }}"> --}}
    <div class="card-body">
      <h2 class="card-title">{{ $event->name }}</h2>
      <p class="card-text">{{ $event->description }}</p>
      <p class="card-text">{{ $event->city }} / {{ $event->state }}</p>
      <p class="card-text">Data: {{ $event->start }}</p>
      <p class="card-text">Local: {{ $event->name_place }}</p>

      <div class="card-buttom">
        <a href="{{ route('buy_ticket', $event->id) }}" class="card-link">Comprar ingresso</a>
        @if (Auth::user()->id == $event->creator)
          <a href="{{ route('edit_event', $event->id) }}" class="card-link">Editar</a>
          <a href="{{ route('destroy_event', $event->id) }}" class="card-link">Excluir</a>
        @endif

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

/* .card-img {
  height: 200px;
  object-fit: cover;
  object-position: center;
} */

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

.card-buttom {
    display: flex;
    justify-content: flex-end;
}

.card-link {
  display: inline-block;
  margin-right: 10px;
  color: #007bff;
}

/* .card-link:hover {
  text-decoration: none;
} */

</style>
@endsection