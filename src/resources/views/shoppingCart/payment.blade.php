@extends('base.layout')

@section('conteudo')
<div class="form-container">
    <form method="POST" action="{{ route('action_payment') }}">
        @csrf

        <div>
            <label for="number">Número do Cartão:</label>
            <input type="text" name="number" id="number" value="4242424242424242" required>
        </div>

        <div>
            <label for="exp_month">Mês de Expiração:</label>
            <input type="text" name="exp_month" id="exp_month" value="8" required>
        </div>

        <div>
            <label for="exp_year">Ano de Expiração:</label>
            <input type="text" name="exp_year" id="exp_year" value="2023" required>
        </div>

        <div>
            <label for="cvc">CVC:</label>
            <input type="text" name="cvc" id="cvc" value="314" required>
        </div>

        <div>
            <label for="amount">Valor:</label>
            <input type="text" name="amount" id="amount" value="10000" required>
        </div>

        <div>
            <label for="description">Descrição:</label>
            <input type="text" name="description" id="description" value="to comprando hehe" required>
        </div>

        <button type="submit">Pagar</button>
    </form>
</div>

<style>
      .form-container {
        margin: 90px 50px 0px 50px;
        background-color: #cdcdcd;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        padding: 20px;
    }

    .form-container label {
        display: block;
        margin-bottom: 10px;
        font-size: 18px;
    }

    .form-container input[type="text"],
    .form-container input[type="number"] {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #ccc;
        margin-bottom: 15px;
    }

    .form-container button[type="submit"] {
        padding: 10px 20px;
        font-size: 16px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
</style>
@endsection