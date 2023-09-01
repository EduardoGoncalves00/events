@extends('base.layout')

@section('conteudo')

<div class="card">
    @foreach ($tickets as $ticket)
        <div class="card-body">
            <h2 class="card-title">Evento: {{ $ticket['event']->name }}</h2>
            <h2 class="card-title">Zona: {{ $ticket['zone'] }}</h2>
            <h2 class="card-title">Meia entrada: {{ $ticket['halfPrice'] }}</h2>
            <h2 class="card-title">Valor unitario do ticket: {{ $ticket['totalAmountEachTicket'] }}</h2>
            <h2 class="card-title">Quantidade de ticket:
                <select class="" name="">
                    Quantidade de ticket
                    <option value=""></option>
                    @for ($i = 1; $i <= $ticket['remainingCapacity']; $i++)
                        <option value="{{ $i }}" {{ $ticket['quantity'] === $i ? 'selected' : '' }}>
                            {{ $ticket['quantity'] === $i ? $ticket['quantity'] : $i }}
                        </option>
                    @endfor
                </select>
            </h2>
            <h2 class="card-title">Valor total: {{ $ticket['totalAmountEachTicket'] * $ticket['quantity']}}</h2>
        </div>
    @endforeach
    <h2 class="card-title">Valor total do carrinho: {{ $totalValueTickets }}</h2>
    <a href='{{ route('index_payment') }}' class='btn btn-primary'>Comprar</a>
</div>

<style>
.card {
    margin: 90px 50px 0px 50px;
    background-color: #cdcdcd;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
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

.card-link {
    display: inline-block;
    margin-right: 10px;
    color: #007bff;
}

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