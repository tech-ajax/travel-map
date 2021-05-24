<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\User;
use App\HashTag;

class PlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //　店舗一覧を取得
        $places=Place::all();
        //店舗一覧ビューで表示
        
        return view('places.index',['places'=>$places,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $place = new Place;
        
        // メッセージ作成ビューを表示
        return view('places.create', ['place'=>$place,]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   // postでplaces/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        $request->validate([
        'place_name' => 'required',
        'country' => 'required',
        'address' => 'required',
        'phone' => 'required|max:14',
        'link' => 'required|max:255',
        'comment' => 'required|max:255',
]);
        
        $request->validate([
        'profile_photo'=>['file','image','mimes:jpeg,png,jpg,bmb','max:2048'],
        ]);
        
        $this->validate($request, [
            'hash_tags'=>['string','max:255']]);
        
        //写真アップロードのため
        if($profile_photo = $request->profile_photo){
        //保存するファイルに名前をつける    
           $fileName = time().'.'.$profile_photo->getClientOriginalExtension();
        //Laravel直下のpublicディレクトリに新フォルダをつくり保存する
           $target_path = public_path('/uploads/');
           $profile_photo->move($target_path,$fileName);
               
         }else{
        //画像が登録されなかった時はから文字をいれる
           $fileName = "";
         
         }
        // メッセージを作成
        $place = new Place;
        $place->user_id = \Auth::id(); 
        $place->place_name = $request->place_name;
        $place->country = $request->country;
        $place->address = $request->address;
        $place->lat = $request->lat;
        $place->lng = $request->lng;
        $place->phone = $request->phone;
        $place->link    = $request->link;
        $place->comment = $request->comment;
        $place->profile_photo = $fileName;
        $place->timestamps= false;

        $place->save();

        // hash_tagsテーブルへの処理
        // ex: preg_split('/\s+/', '   tag1 tag2 tag3    tag4  ', -1, PREG_SPLIT_NO_EMPTY)
        //     == ['tag1', 'tag2, 'tag3', 'tag4'];
        $hash_tag_names = preg_split('/\s+/', $request->input('hash_tags'), -1, PREG_SPLIT_NO_EMPTY);
        $hash_tag_ids = [];
        foreach ($hash_tag_names as $hash_tag_name) {
            $hash_tag = HashTag::firstOrCreate([
                'name' => $hash_tag_name,
            ]);
            $hash_tag_ids[] = $hash_tag->id;
        }

        // 中間テーブルの処理
        $place->hashTags()->sync($hash_tag_ids);
        $request->session()->flash('flash_message', '新規登録が完了しました！');

        // トップページへリダイレクトさせる
        return redirect('/');
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // getでplaces/idにアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        // idの値でメッセージを検索して取得
        $place = Place::findOrFail($id);

        // メッセージ詳細ビューでそれを表示
        return view('places.show', [
            'place' => $place,
        ]);
    }
        
        
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // getでplaces/id/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        // idの値でメッセージを検索して取得
        $place = Place::findOrFail($id);

        // メッセージ編集ビューでそれを表示
        return view('places.edit', [
            'place' => $place,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    // putまたはpatchでplaces/idにアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        // idの値でメッセージを検索して取得
        $place = Place::findOrFail($id);
  
        $request->validate([
        'profile_photo'=>['file','image','mimes:jpeg,png,jpg,bmb','max:2048'],
        ]);
        
        $this->validate($request, [
            'hash_tags'=>['string','max:255']]);
        
        //写真アップロードのため
        if($profile_photo = $request->profile_photo){
        //保存するファイルに名前をつける    
           $fileName = time().'.'.$profile_photo->getClientOriginalExtension();
        //Laravel直下のpublicディレクトリに新フォルダをつくり保存する
           $target_path = public_path('/uploads/');
           $profile_photo->move($target_path,$fileName);
         
        }else{
        //画像が登録されなかった時はから文字をいれる
           $fileName = $place->profile_photo;
        }
        
      
        // メッセージを更新
        $place->place_name = $request->place_name;
        $place->country = $request->country;
        $place->address = $request->address;
        $place->lat = $request->lat;
        $place->lng = $request->lng;
        $place->phone = $request->phone;
        $place->link    = $request->link;
        $place->comment = $request->comment;
        $place->profile_photo = $fileName;
        $place->timestamps= false;
        $place->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // deleteでmessages/idにアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        // idの値でメッセージを検索して取得
        $place = Place::findOrFail($id);

        // メッセージを削除
        $place->delete();

        // トップページへリダイレクトさせる
        return redirect('/');
    }
    
        //　ハッシュタグの項目ごとのplaceを表示
    public function showByHashTag($id){
        

            
        $hash_tag = HashTag::find($id);    
        
        return view('places.hashtag',[
            'places'=>$hash_tag->places,
            'name'=>$hash_tag->name,
            ]);
        }


        //　placeの検索結果を表示する
    public function search(Request $request){
         
        $search=$request->input('search');
        
        // クエリ生成
        $query=Place::query();
        
        //もしキーワードがあれば
        if(!empty($search))
        {
         $query
         ->where('place_name','like','%'.$search.'%')
         ->orWhere('country','like','%'.$search.'%')
         ->orWhere('address','like','%'.$search.'%')
         ->orWhere('phone','like','%'.$search.'%')
         ->orWhere('link','like','%'.$search.'%')
         ->orWhere('comment','like','%'.$search.'%')
         //多対多のリレーションのカラムを検索
         ->orWhereHas('hashTags',function($query) use ($search){
             $query->where('name','like','%'.$search.'%');
             })->get();
         
        //ページネーション
        $places = $query->paginate(10);
        return view('places.search')->with('places',$places)
        ->with('search',$search);
        }
    }
    
    
}
