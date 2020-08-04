
{{-- 
補足： ul class="navbar-nav" を2つ記述しています。

                    ul class="navbar-nav mr-auto"
                  
                  

1つ目の ul に mr-auto クラスを設定して内容は空っぽにしておくと
2つ目の ul に追加した li の内容はナビゲーションバーの右側に表示されます。
 なお、bladeでは  下の様な   波かっこ二つ  を使ってコメントアウトを行います。

!!  !!  で取り囲んでいるところは、LaravelCollective です。

LaravelCollective  の を使った場合には、
htmlspecialchars関数に通さなかったことになりますが、
Laravel Collectiveの関数やファサードは渡されたデータの無害化を内部で行うため、そのまま出力して問題ないからです。



普段は、bladeでは  二重波かっこを使ってください
Bladeでは基本的にで  二重波かっこ    囲う記法を使ってください。
htmlspecialchars関数に通したものが出力されます
これはPHPのレッスンで学んだように、
悪意あるユーザによってフォーム経由で入力されたHTMLがそのまま実行されることを防ぐためです。



--}}


{{--  .blade.php の拡張子のついたファイルでは、コメントは　この波かっこの中に書くこと  --}}
{{-- bladeでは この波かっこを使用してコメントを書いてください --}}
{{-- --}}
{{-- --}}



<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        {{--  トップページへのリンク --}}
        <a class="navbar-brand" href="/">Microposts</a>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
        
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            
            
            <ul class="navbar-nav">
                @if(Auth::check())
                
                     {{-- ユーザ一覧ページへのリンク --}}
                     
                     <li class="nav-item">
                         {!! link_to_route('users.index', 'Users', [], ['class' => 'nav-link'])  !!}
                         
                     </li>
                     
                     
                     <li class="nav-item dropdown">
                         
                         <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                             {{ Auth::user()->name }}
                         </a>
                         
                         <ul calss="dropdown-menu dropdown-menu-right">
                             
                             {{-- ユーザ詳細ページへのリンク --}}
                             
                             <li class="dropdown-item">
                                 
                                 {{--  
                                 ここで Auth::id() というクラスメソッドを使いましたが、
                                 これはログインユーザのIDを取得することができるメソッドで、
                                 Auth::user()->id と同じ動きになります。覚えておきましょう。
                                 --}}
                                 
                                 {!! link_to_route('users.show', 'My profile', ['user' => Auth::id() ])  !!}
                             
                             </li>
                             
                             <li class="dropdown-driver"></li>
                             
                             {{-- ログアウトへのリンク --}}
                             <li class="dropdown-item">
                                 {!!  link_to_route('logout.get', 'Logout') !!}
                             </li>
                             
                         </ul>
                     </li>
                
                @else
                
                    {{-- ユーザー登録ページへのリンク  ナビゲーションバーの  Signup のところ --}
                    <li class="nav-item">
                        {!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}
                    </li>
                    
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item">
                        {!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}
                    </li>
                @endif
            </ul>
        </div>
        
    </nav>
    
</header>


{{--  Auth::check()   は、ユーザがログインしているかどうかを調べるための関数です  --}}


{{-- 

Bladeのファイル内で、条件によって表示内容を分けるために if-else 文を使いたいときは
@if (条件式） ... @else ... @endif の指定をしてください。

Authファサードについて
ファサード とは、各クラスのメソッドを扱いやすくしたものです。
以下に ‘Auth’ => Illuminate\Support\Facades\Auth::class, とありますが、
右側のIlluminate\Support\Facades\Auth::classがファサードに登録したいクラスです。
通常はIlluminate\Support\Facades\Authと記述する必要があるところを、
Authと短く記述して呼び出せるようになります。つまりはエイリアスなのです。

ファサードは、 config/app.phpのaliasesの中で設定されています。


'Auth' => Illuminate\Support\Facades\Auth::class,


実は、今までにも上記にあるDBファサードを使った DB::reconnect()（DB::connection()）や、
Routeファサードを使ってのルーティングの設定などいくつかのファサードを利用しています。



中でも、 Authファサードは認証に関する一連のメソッドを提供しています。
先ほど紹介した Auth::check()もその1つで、 
別のメソッドであるAuth::user() を利用するとログイン中のユーザを取得できます

--}}