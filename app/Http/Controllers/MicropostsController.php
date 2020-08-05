<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MicropostsController extends Controller
{
    
    
    public function index()
    {
        
        $data = [];  // まず空の配列を宣言する
        
        if(\Auth::check()) {    //  認証済みの場合に　｛｝の中を実行する
        
            $user = \Auth::user();   //  認証済みのユーザを取得する    
            
            // ユーザのとうこういちらんを作成日時の降順で取得
            $microposts = $user->microposts()->orderBy('created_at','desc')->paginate(10);
            
            //　配列に入れる これをびゅーに送る
            // ビュー側で取得するときは'user' => $user だったら
            //キーでしゅとくするので$userという変数名で取得するが
            //  もしも 'microposts' => $microposts   ではなくて'test' => $microposts
            // だったら、ビュー側で取得するときの変数名は$micropostsではなくて$testとなりますのでっ注意
            
            $data = ['user' => $user, 'microposts' => $microposts, ];
            
        }
        
        // Welcomeビューでそれを表示  'user' => $user, 'microposts' => $microposts,
        return view('welcome', $data);
        
    }
    
    
    
}
