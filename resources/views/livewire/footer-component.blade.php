<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>locations</h3>
            @foreach($infos as $country)
                @if($country->type == 1)
                <a href="@if(!empty($country->link)){{ $country->link }} @else # @endif">{{ $country->name }}</a>
                @endif
            @endforeach
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="/">home</a>
            <a href="{{ route('menu.index') }}">dishes</a>
            @auth
                <a href="{{ route('user.order') }}">order</a>
                @can ('admin-access')
                    <a href="{{ route('admin.dashboard') }}">dashboard</a>
                @endcan
                <a href="{{ route('user.profile') }}">profile</a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" aria-expanded="false">Logout</a>
                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}">login</a>
                <a href="{{ route('register') }}">register</a>
            @endif
        </div>

        <div class="box">
            <h3>contact info</h3>
            @foreach($infos as $contact)
                @if($contact->type == 2)
                <a href="@if(!empty($contact->link)){{ $contact->link }} @else # @endif">{{ $contact->name }}</a>
                @endif
            @endforeach
        </div>

        <div class="box">
            <h3>follow us</h3>
            @foreach($infos as $media)
                @if($media->type == 3)
                <a href="@if(!empty($media->link)){{ $media->link }} @else # @endif">{{ $media->name }}</a>
                @endif
            @endforeach
        </div>

    </div>

    <div class="credit"> copyright @ 2021 by <span>mr. web designer</span> </div>

</section>
