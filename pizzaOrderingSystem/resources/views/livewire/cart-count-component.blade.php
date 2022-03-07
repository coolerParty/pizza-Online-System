
    <a href="{{ route('cart.index') }}" class="fas fa-shopping-cart"> 
        @if (Cart::instance('cart')->count() > 0)
            {{ Cart::instance('cart')->count(); }}
        @endif
    </a>
