<!--API key-->


<script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyA2NV_HRhtfKhiuJ1xqPpOZuSC1bpBQRr8&callback=initMap" async defer></script>
<script type="text/javascript">


var map;
var marker = [];
var infoWindow = [];

// マーカーを立てる場所名・緯度・経度
var markerData = [ 

// 一覧を表示
@if(isset($places))
 @foreach ($places as $place)
  @if($place->lat == null || $place->lng == null)
  @continue
  @else
  {
       name:'{{$place->place_name}}<br><a href="{{ route('places.show', ['place' => $place->id])}}">for more</a>',  
       lat: {{$place->lat}},
       lng: {{$place->lng}},
  }, 
  @endif
 @endforeach
@endif
];
 
function initMap() {
   // 地図の作成
   // 緯度経度のデータ作成
   map = new google.maps.Map(document.getElementById('map'), { // mapに地図を埋め込む
   center: new google.maps.LatLng( 35.689236+0.0008, 139.735744 ), // 地図の中心を指定
   zoom: 12 // 地図のズームを指定
   });
 
 // マーカー毎の処理
 for (var i = 0; i < markerData.length; i++) {
        markerLatLng = new google.maps.LatLng({lat: markerData[i]['lat'], lng: markerData[i]['lng']}); // 緯度経度のデータ作成
        marker[i] = new google.maps.Marker({ // マーカーの追加
         position: markerLatLng, // マーカーを立てる位置を指定
            map: map // マーカーを立てる地図を指定
       });
 
     infoWindow[i] = new google.maps.InfoWindow({ // 吹き出しの追加
         content: '<div class="map">' + markerData[i]['name'] + '</div>' // 吹き出しに表示する内容
       });
 
     markerEvent(i); // マーカーにクリックイベントを追加
 }
}
 
// マーカーにクリックイベントを追加
function markerEvent(i) {
    marker[i].addListener('click', function() { // マーカーをクリックしたとき
      infoWindow[i].open(map, marker[i]); // 吹き出しの表示
  });
}

</script>