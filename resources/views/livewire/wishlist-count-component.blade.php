
    <a href="{{ route('wishlist.index') }}" class="fas fa-heart">
        @if (Cart::instance('wishlist')->count() >0)
            {{ Cart::instance('wishlist')->count() }}
        @endif
    </a>
