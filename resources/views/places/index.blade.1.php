 <h1>店舗一覧</h1>

    @if (count($places) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>店舗</th>
                </tr>
            </thead>
            
            
            <!--　検索フォーム機能　-->
            <div class="col-sm-4" style="padding:20px 0; padding-left:0px;">
                <form class="form-inline" action="{{url('/places/search')}}">
                    <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="検索">
                    </div>
                    <input type="submit" value="検索" class="btn btn-info">
                </form>
            </div>
            
            
            <tbody>
                @foreach ($places as $place)
                <tr>
                    <td>{{ $place->id }}</td>
                    <td>{{ $place->place_name }}</td>
                    <td>{{ $place->country }}</td>
                    <td>{{ $place->address }}</td>
                    <td>{{ $place->phone }}</td>
                    <td>{{ $place->link }}</td>
                    <td>{{ $place->comment }}</td> 
                    <td>
                    @if(count($place->hashTags) > 0)
                        @foreach($place->hashTags as $hash_tag)
                                    <a href="{{ route('hash_tags.places', ['id' => $hash_tag->id]) }}">
                                        <span class="label label-info">
                                            <span class="glyphicon glyphicon-tags" aria-hidden="true"></span> {{ $hash_tag->name }}
                                        </span>
                                    </a>
                        @endforeach
                    @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif