@extends('base.layout')

@section('conteudo')

<div class="card">
    {{-- <img class="card-img" src="{{ $event->image }}" alt="{{ $event->name }}"> --}}
    <div class="card-body">
        <h2 class="card-title">{{ $event->name }}</h2>
        <p class="card-text">{{ $event->description }}</p>
        <p class="card-text">{{ $event->city }} / {{ $event->state }}</p>
        <p class="card-text">{{ $event->start }}</p>
        <p class="card-text">{{ $event->name_place }}</p>
    </div>
</div>

<div class="zone">
    <form action="{{ route('add_cart', $event->id) }}" method="POST">
        @csrf
        @method('POST')
        <div class="zone-body">
            <h2 class="zone-title">Escolha a zona em que gostaria de comprar</h2>
    
            <div class="zone-text">
                @foreach ($zonesEvent as $zone)
                    <p>
                        {{ $zone->name }} - R$ {{ $zone->value }} / restantes: {{ $zone->capacity - $zone->bought }} unidades
                    </p>
                @endforeach
                <select class="zone-select" name="zone_id">
                    <option disabled value="">Zonas do evento</option>
                    @foreach ($zonesEvent as $zone)
                        <option value="{{ $zone->id }}" {{ $zone->capacity === $zone->bought ? 'disabled' : '' }}>
                            {{ $zone->name }} - R$ {{ $zone->value }}
                        </option>
                    @endforeach
                </select>  
            </div>

            <div>
                <div class="mb-3">
                    <select class="form-select" name="quantity">
                      <option selected></option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                    </select>

                    <label class="form-label">Quantidade de ingressos</label>
                </div>
            </div>

            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="half_price" value="true">
                <label class="form-check-label" for="half_price">Meia entrada?</label>
            </div>            
    
            <div class="zone-buttom">
                <button type="submit" class="btn btn-primary">Adicionar ao carrinho</button>
            </div>
        </div> 
    </form>
</div>

<style>
.card {
    margin: 90px 50px 0px 50px;
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

.card-link {
    display: inline-block;
    margin-right: 10px;
    color: #007bff;
}

/* .card-link:hover {
    text-decoration: none;
} */

.zone {
    margin: 30px 50px 60px 50px;
    background-color: #cdcdcd;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);   
}

.zone-body {
    padding: 20px;
}

.zone-title {
    font-size: 24px;
    margin-bottom: 25px;
}

.zone-text {
    font-size: 18px;
    margin-bottom: 10px;
}

.zone-select {
    margin-top: 25px; 
    padding: 10px 90px 10px 10px; 
}

.zone-buttom {
    display: flex;
    margin-top: 25px;
    justify-content: center;
}

</style>
@endsection