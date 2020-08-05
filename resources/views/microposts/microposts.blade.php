{{-- Welcomeビューで表示 するのですが  --}





@if (count($microposts) > 0)

    <ul class="list-unstyled">
        @foreach ($microposts  as $micropost)
            <li class="midia mb-3">
                
                {{-- 投稿の所有者の　メールアドレスをもとにGravatarを取得して表示　--}}
                <img class="mr-2 rounded" src="{{Gravatar::get($micropost->user->email,  ['size' => 50]) }}" alt="">
                
                
                
                
                
                
            </li>
        
        @endfoeach
    </ul>


@endif