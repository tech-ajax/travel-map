<!--API key-->

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>


<script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyA2NV_HRhtfKhiuJ1xqPpOZuSC1bpBQRr8&callback=initMap" async defer></script>


<script type="text/javascript">


function initMap( )
{	
	
	var mapOptions = {
		
		// ズームレベル
		//     数字が小さいほど広域、数字が大きいほど詳細な地図になる
		//     最小値は0、最大値は未定義
		zoom: 5,
		
		// 地図の種類
		//     ROADMAP: 市街地地図
		//     SATELLITE: 航空写真
		//     HYBRID:     航空写真 + 都市名等
		//     TERRAIN:   地形の特徴と植物の分布
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		
		// マップ中心の緯度と経度
		//     緯度経度取得：http://www.geocoding.jp/
		center: new google.maps.LatLng( 37.589236+0.0008, 139.735744 )
	};
	
	// Mapクラスのインスタンスを作成
	var map = new google.maps.Map( document.getElementById( 'map' ), mapOptions ) ;
	
	// Geocoding
	var geocoder = new google.maps.Geocoder();
	
	
	
	// 一覧を表示
	@if(isset($places))
	@foreach ($places as $place)
	var marker =getMarker(
		{
			position: new google.maps.LatLng({{$place->id}}, {{$place->phone}} ),
			title: "World Restaurant.",
			map: map,
		}
	);
	
	//情報ウィンドウの生成
    var infoWindow = new google.maps.InfoWindow({
    content: '{{$place->id}}',
    pixelOffset: new google.maps.Size(0, 5)
    });
   
	//マーカーにリスナーを設定
   marker.addListener('click', function(){
      infoWindow.open(map, marker);
    });	
	
	@endforeach
	@endif
	
	
	
}


<!--マーカー-->
function getMarker( option )
{
	var marker = new google.maps.Marker( option );
	return marker;
}

google.maps.event.addDomListener( window, 'load', initMap ) ;

</script>