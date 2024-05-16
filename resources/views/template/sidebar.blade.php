<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <div class="sidebar">
        <nav class="mt-2">
            @if(Auth::user()->role == 1)
            @include('template.Menu.menuAdmin')
            @elseif(Auth::user()->role == 2)
            @include('template.Menu.menuCustomer')
            @endif
        </nav>

    </div>

</aside>