<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
また、 今まで / はRouterからControllerへ飛ばさずに
直接welcomeのViewを表示させていました。

ここからは少し複雑なことを行っていくのですが
、上記の記述を下記のように変更し、
Controller ( MicropostsController@index ) を経由し
てwelcomeを表示するようにします。
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'MicropostsController@index');


//  ユーザー登録のルーティングの設定
//   ->name() はこのルーティングに名前をつけているだけです。後ほど、 Formやlink_to_route() で使用することになります。

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup','Auth\RegisterController@register')->name('signup.post');


// 認証  つまり  ログイン
// 認証は、LoginControllerが担当します。以下の3つのルーティングを routes/web.php に追記してください。
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');  // name()でルーティングに名前を付けています
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');


// 認証付きのルーティング
/*

RegisterControllerが用意していたユーザ登録アクション以外に、下記のアクションを作成します。

ユーザ一覧（index)
ユーザ詳細（show)
この2つのアクションは、RegisterControllerとは別に 
UsersController を用意し、その中に書いていきましょう。
ユーザ一覧とユーザ詳細はログインしていない閲覧者には見せたくありません。
そのようなときは auth ミドルウェアを使いましょう。

guest ミドルウェアと同じように
コントローラのコンストラクタで指定することもできますが、
ここではルーティングで指定します。

Route::group() でルートのグループを作り、 auth ミドルウェアを指定することで、
このグループ内のルートへアクセスする際に、認証を必要とするようにできます。

なお、 ['only' => ['index', 'show']] は作成されるルートを絞り込んでいます。
この UsersController は7つのアクションのうち
index（ユーザ一覧）と show（ユーザ詳細）だけで良いからです。

*/
Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);

    //  Micropostsのルーティングを設定  登録のstoreと削除のdestroyのみ
    //  もし　ほかのアクションにも認証を必要とするときには、それも書く
    //  認証済みのユーザだけがこれらのアクションにアクセスできます。
    
    Route::resource('microposts', 'MicropostsController',['only' => ['store', 'destroy']]);
    
});


