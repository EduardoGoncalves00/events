<ul class="nav nav-tabs">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Eventos</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href= '{{ route('index_events') }}'>Eventos</a>
          <a class="dropdown-item" href= '{{ route('my_events') }}'>Meus eventos</a>
          <a class="dropdown-item" href= '{{ route('create_event') }}'>Criar eventos</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Tickets</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href= '{{ route('index_tickets') }}'>Tickets comprados</a>
        </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Carrinho</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href= '{{ route('index_shoppingcart') }}'>Ver tickets</a>
      </div>
  </li>
  </ul>