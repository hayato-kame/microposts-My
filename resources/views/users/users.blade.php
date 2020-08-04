@if (count($users) > 0)

    <ul class="list-unstyled">
        @foreach ($users as $user)
        
            <li class="media">
                {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                
                <img class="mr-2 rounded" src="{{ Gravatar::get($user->email, ['size' => 50]) }}" alt="">

                <div class="media-body">
                    <div>
                        {{ $user->name }}
                    </div>
                    <div>
                        {{-- ユーザ詳細ページへのリンク --}}
                        <p>
                            {!! link_to_route('users.show', 'View profile', ['user' => $user->id])  !!}
                        </p>
                    </div>
                </div>                
                
            </li>
        
        @endforeach
    </ul>
    
  {{--  ページネーションのリンク    Bootstrapの部品  --}}  
  
    {{  $users->links() }}
    

@endif






{{-- Bladeでのコメントです  --}}
{{-- 

UsersControllerの index()アクションでは、

$users = User::orderBy('id', 'desc')->paginate(10); 
で、10件ずつ取得する形式にしています

ControllerだけでなくViewも追記する必要があります。
{{ $users->links() }} を追記してください

--}}
{{--  --}}
{{--  --}}