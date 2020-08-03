
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
            <ul class="navbar-nav navbar-right">
                
                {{-- ユーザー登録ページへのリンク  ナビゲーションバーの  Signup のところ --}
                <li>
                    {!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}
                </li>
                
                {{-- ログインページへのリンク --}}
                <li>
                    <a href="#">Login</a>
                </li>
                
            </ul>
        </div>
        
    </nav>
    
</header>
