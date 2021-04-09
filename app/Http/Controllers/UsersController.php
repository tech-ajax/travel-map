<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\User;


class UsersController extends Controller
{
    // public function index()
    // {
    //     //　店舗一覧を取得
    //     $places=Place::all();
    //     //店舗一覧ビューで表示
        
    //     return view('users.index',['places'=>$places,]);
    // }
    
    public function show($id)
    {
        
        //　店舗一覧を取得
        $places=Place::all();
        $user = User::findOrFail($id);

        return view('users.show',['user'=>$user, 'places'=>$places]);
        }
    
    public function favorites($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // // 関係するモデルの件数をロード
        // $user->loadRelationshipCounts();

        // ユーザの投稿一覧を作成日時の降順で取得
        $places = $user->favorites()->orderBy('created_at', 'desc')->paginate(10);

        // ユーザ詳細ビューでそれらを表示
        return view('users.favorites', [
            'user' => $user,
            'places' => $places,
        ]);
        
        
    }
    
    
}
