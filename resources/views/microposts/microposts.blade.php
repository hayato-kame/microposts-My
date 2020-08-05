{{-- Welcomeビューで表示 するのですが  --}





@if (count($microposts) > 0)

    <ul class="list-unstyled">
        @foreach ($microposts  as $micropost)
            <li class="midia mb-3">
                
                {{-- 投稿の所有者の　メールアドレスをもとにGravatarを取得して表示　--}}
                <img class="mr-2 rounded" src="{{Gravatar::get($micropost->user->email,  ['size' => 50]) }}" alt="">
                
                <div class="media-body">
                    <div>
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        
                        {!! link_to_route('users.show', $micropost->user->name, ['user' => $micropost->user->id]) !!}
                        
                        <span class="text-muted">posted at {{ $micropost->created_at }} </span>
                        
                    </div>
                    
                    <div>
                        
                        {{-- 投稿内容   nl2br — 改行文字の前に HTML の改行タグを挿入する --}
                        <p class="mb-0">
                            {!! nl2br(e($micropost->content)) !!}
                            
                        </p>
                    </div>
        
                </div>
 
            </li>
        
        @endfoeach
    </ul>
    {{-- ぺーじページネーションのりんくコントローラを設定すれば　Viewでは　これをつけるだけでBootstrapの部品が表示される --}

    {{ $microposts->links() }}

@endif


{{--  この　microposts.blade.php をwelcome.blade.phpでincludeすれば

ログイン後のトップページに自分の投稿したMicropostsが表示されるようになります
--}} 