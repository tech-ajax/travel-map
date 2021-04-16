<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>世界のレストラン in Japan</title>
         <!--CSSのリンク先-->
         <link href="{{ asset('css/style.css') }}" rel="stylesheet">
         <meta name="description" content="世界のレストランを日本で楽しもう♫">
       
        <!-- ファビコン -->
        <link rel="icon" href="{{ asset('img/favicon.png') }}" alt="World Restaurant in Tokyo favicon">
         
        <!-- レスポンシブ -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
          <!-- マテリアルアイコン  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <style type="text/css">

#map
{
	width: 100%;
	height: 500px;
}
</style>
    
    
    </head>

    <body>
        
        {{-- ナビゲーションバー --}}
        @include('commons.navbar')

        <div>
            {{-- エラーメッセージ --}}
            @include('commons.error_messages')

            @yield('content')
        </div>
        
    <script type="text/javascript" src="{{ asset('/js/style.js') }}"></script>
    
    <!--Google Maps API-->
    @include('apis.map')
    
    </body>
</html>