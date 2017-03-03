<nav class="navbar navbar-inverse" style="border-radius: 0px">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="{{ URL::route("index") }}">{{ Globals::siteName() }}</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <?php $active = "class=active"; ?>
                <li @if($page == "about") {{ $active }} @endif><a href="{{ URL::route("about") }}"><span class="glyphicon glyphicon-info-sign"></span> About</a></li>
                <li @if($page == "privacy") {{ $active }} @endif><a href="{{ URL::route("privacy") }}"><span class="glyphicon glyphicon-lock"></span> Privacy</a></li>
                <li @if($page == "howto") {{ $active }} @endif><a href="{{ URL::route("howto") }}"><span class="glyphicon glyphicon-question-sign"></span> How to</a></li>
                <li @if($page == "topartists") {{ $active }} @endif><a href="{{ URL::route("topArtists") }}"><span class="glyphicon glyphicon-new-window"></span> Top Artists</a></li>
                <li @if($page == "popularmusic") {{ $active }} @endif><a href="{{ URL::route("popularMusic") }}"><span class="glyphicon glyphicon-globe"></span> Popular</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mp3 Source<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <form id="sources-form">
                            <?php $i = 1 ?>
                            @foreach($sources as $source)
                            <?php
                            $names = array('4shared' => '4s',
                                'archive' => 'ar',
                                'deezer' => 'dz',
                                'promodj' => 'pd',
                                'soundcloud' => 'sc',
                                'vk' => 'vk',
                                'yandex' => 'yd',
                                'youtube' => 'yt');
                            ?>
                            @if($source->active == 1)
                            <li>
                                <a href="#" style="color:black;font-size: 14px" class="beautiful">
                                    <label class="mdl-checkbox mdl-js-checkbox" for="checkbox{{ $i }}">
                                        <input type="checkbox" id="checkbox{{ $i }}" class="mdl-checkbox__input" name={{ $names[$source->name] }} value='1' @if($selected_sources[$names[$source->name]] == 1 ) {{ "checked" }} @endif>
                                        <span class="mdl-checkbox__label" style="text-transform:capitalize">{{ $source->name }}</span>
                                    </label>
                                </a>
                            </li>
                            <?php $i++ ?>
                            @endif
                            @endforeach
                        </form>
                        @if(!Auth::guest())
                        <li @if($page == "editSources") {{ $active }} @endif><a href="{{ URL::route("editSources") }}"><span class="glyphicon glyphicon-pencil"></span> Edit Sources</a></li>
                        @endif
                    </ul>
                </li>
                <li @if($page == "dmca") {{ $active }} @endif><a href="{{ URL::route("dmca") }}"><span class="glyphicon glyphicon-phone"></span> DMCA</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                <!--<li><a href="{{ route('login') }}">Login</a></li>-->
                <!--<li><a href="{{ route('register') }}">Register</a></li>-->
                @else
                <li><a href="{{ route('register') }}">Register New Admin</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>