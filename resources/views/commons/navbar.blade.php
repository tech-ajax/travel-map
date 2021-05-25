<header>
    <div class="nav-container">
            <div class="nav-logo">
                <h1><a href="{{ route('welcome') }}"><img src="{{ asset('img/Logo.png') }}" alt="Travel Map"></a></h1>
                <h3>タグ・キーワードで検索してブックマークしよう</h3>
            </div>
            <nav>
                <ul class="main-nav">
                    
                    <!--　検索フォーム機能　-->
                    <li>
                    <div class="index-form">
                        <form class="" action="{{url('/places/search')}}">
                            <input type="text" name="search" class="" placeholder="Search">
                            <input type="submit" value="検索" class="">
                        </form>
                    </div>
                    </li>
  
                   @if (Auth::check())
                    <li>
                        <div class="dropdown-menu">
                            <p>メニュー</p>
                        
                            <div class="sub-menu">
                                <ul class>
                                    {{-- ユーザ詳細ページへのリンク --}}
                                    <li><a href="{{ route('welcome') }}">{{ Auth::user()->name }}のページ</a></li>
                                    {{-- ログアウトへのリンク --}}
                                    <li>{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    @else
                        <li><a href="{{ route('guide') }}">ご利用方法</a></li>
                        {{-- ユーザ登録ページへのリンク --}}
                        <li>{!! link_to_route('signup.get', '登録', [], ['class' => 'nav-link']) !!}</li>
                        {{-- ログインページへのリンク --}}
                        <li>{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                    @endif
                    
                </ul>
                <div class="menu">
                    <span class="material-icons " id="open">sort</span>
                </div>
            
            </nav>
    </div>

    <!-- メニューオープン -->
    <div class="overlay">
      <span class="material-icons" id="close">close</span>
      <ul class="open-nav">
        <h1><a href="{{ route('welcome') }}"><img src="{{ asset('img/Logo.png') }}"> </a></h1>
        
        @if (Auth::check())
        <div class="open-box"> 
            <li>
                <form class="" action="{{url('/places/search')}}">
                <input type="text" name="search" class="" placeholder="Search">
                <input type="submit" value="検索" class="">
                </form>
            </li>
             {{-- ユーザ詳細ページへのリンク --}}
            <li><a href="{{ route('welcome') }}">{{ Auth::user()->name }}のページ</a></li>
            {{-- ログアウトへのリンク --}}
            <li>{!! link_to_route('logout.get', 'ログアウト') !!}</li>
        </div>
        
        @else
        <div class="open-box"> 
            <li>
                <form class="" action="{{url('/places/search')}}">
                <input type="text" name="search" class="" placeholder="Search">
                <input type="submit" value="検索" class="">
                </form>
            </li>
            <li><a href="{{ route('guide') }}">ご利用方法</a></li>
            {{-- ユーザ登録ページへのリンク --}}
            <li>{!! link_to_route('signup.get', '登録', [], ['class' => 'nav-link']) !!}</li>
            {{-- ログインページへのリンク --}}
            <li>{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
        </div>
        @endif
        
      </ul>
    </div>

</header>
 