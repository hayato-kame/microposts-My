<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\User;   // 追加

/**
 * ここではindexとshowのみを実装します。
 * createアクションやstoreアクションについてはRegisterControllerで実装されているため不要です。
Userに関するControllerを2つ用意する形となります。
 * 
 * 
 * 
 */
class UsersController extends Controller
{
    
    public function index(){
    // ユーザ一覧をidの降順で取得
    $users = User::orderBy('id', 'desc')->paginate(10);
    
    // ユーザ一覧ビューでそれを表示  viewsフォルダ以下のフォルダ名.ファイル名で指定する
    // 'users' キーで送る ビュー側では、キーの名前が変数名の名前になる
    // 'users' => $users  なら、　ビュー側では $usersだけど、もし
    //  'test' => $users  だったら、  ビュー側では $test という変数名になりますので注意
    return view('users.index', ['users' => $users,]);
    }  
    
}
