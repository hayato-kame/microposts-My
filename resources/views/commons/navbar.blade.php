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
                
                {{-- ユーザー登録ページへのリンク --}
                <li class="nav-item">
                    <a href="#" class="nav-link">Signup</a>
                </li>
                
                {{-- ログインページへのリンク --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">Login</a>
                </li>
                
            </ul>
        </div>
        
    </nav>
    
</header>



{{-- 
補足： ul class="navbar-nav" を2つ記述しています。

                    ul class="navbar-nav mr-auto"
                  
                  

1つ目の ul に mr-auto クラスを設定して内容は空っぽにしておくと
2つ目の ul に追加した li の内容はナビゲーションバーの右側に表示されます。
 なお、bladeでは  下の様な   波かっこ二つ  を使ってコメントアウトを行います。



--}}


{{--  .blade.php の拡張子のついたファイルでは、コメントは　この波かっこの中に書くこと  --}}
{{-- bladeでは この波かっこを使用してコメントを書いてください --}}
{{-- --}}
{{-- --}}