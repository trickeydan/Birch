<ul class="nav navbar-nav">
    @foreach($menu as $key => $value)
        @if(count($value) == 0)
            @if($user->hasPermission($pages[$key]['perm']))

                <li><a href="{{route($key)}}"><i class="fa fa-{{$pages[$key]['icon']}}"></i>&nbsp;{{$pages[$key]['title']}}</a></li>

            @endif
        @else
            <li class="dropdown">
                <a href="{{route($value[0])}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-{{$pages[$value[0]]['icon']}}"></i>&nbsp;{{$pages[$value[0]]['title']}}&nbsp;<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    @for($i = 1; $i < count($value) -1; $i++)
                        <li><a href="{{route($value[$i])}}"><i class="fa fa-{{$pages[$value[$i]]['icon']}}"></i>&nbsp;{{$pages[$value[$i]]['title']}}</a></li>
                    @endfor
                </ul>
            </li>
        @endif
    @endforeach

</ul>

<ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hi, {{$user->name}} <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="{{route('admin.settings.index')}}"><i class="fa fa-cog"></i> Settings</a></li>
            <li role="separator" class="divider"></li>
            <li>
                <a href="{{ url('/logout') }}"
                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off"></i>&nbsp;Logout
                </a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </li>
</ul>