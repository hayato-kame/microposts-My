<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
   
// トレイトです
//  Router の  　routesフォルダの   web.phpファイル      で設定した 
//  showLoginForm や login のアクションはこのトレイトに定義されています。

    use AuthenticatesUsers;
    

    // リダイレクト先
    protected $redirectTo = RouteServiceProvider::HOME;
    

    // コンストラクタ
    public function __construct()
    {
        
        
        //  ログインしてない閲覧者   'guest'  に対してアクションの実行前にログイン状態を確認し、
        //  ログインしていない場合はmiddlewareをそのまま実行させますが、ログインしている場合は実行させず別のURLへ飛ばします
        //  logout アクションを除くこのコントローラの全アクションに guest ミドルウェアを指定している
        
        
        $this->middleware('guest')->except('logout');
        
    }
}
