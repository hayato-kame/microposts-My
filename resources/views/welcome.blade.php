@extends('layouts.app')

@section('content')

    @if (Auth::check())
    
        <div class="row">
            
            <aside class="col-sm-4">
                
                
                <div class="card">
                    
                   <div class="card">
                       
                       <div class="card-header">
                           <h3 class="card-title">
                               {{  Auth::user()->name   }}
                           </h3>
                       </div>
                       
                       <div class="card-body">
                           {{-- 認証済みユーザのめーるあどれすをもとにGravatarを取得して表  --}
                      
                          <img class="rounded img-fluid" src="{{ Gravatar::get(Auth::user()->email, ['size' => 500]) }}" alt="">
                      
                       </div>
                   </div> 
                </div>
   
                
            </aside>
            <div class="col-sm-8">
                {{-- 投稿一覧　　指定は、resources フォルダの下の viewsフォルダの下を指定する
                'microposts.microposts'  micropostsフォルダのmicroposts.blade.phpファイル 
                --}
                
                @include('microposts.microposts')
                
            </div>
            
        </div>

    
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Microposts</h1>
                
                {{--  ユーザ登録ページへのリンク --}}
                
                {!! link_to_route('signup.get', 'Sign up now', [], ['btn btn-lg btn-primary']) !!}
                
            </div>
        </div>
    @endif
@endsection





{{--  
    'layouts.app' としてるのは、resources/viewsフォルダ以下を表しています。
    
    この welcome.blade.phpは、layoutsフォルダの app.blade.phpファイルを継承してる
    
        フォルダ名.ファイル名 と指定します
        
      @section('content')   と     @endsection の間に書かれたものが、
      layoutsフォルダの app.blade.phpファイルの   @yield('content')  のところに入ります


--}}

{{-- 

ちなみに、Bladeファイルの中には素のPHPコードを埋め込むこともできます。

--}}




{{-- Bladeでのコメントです  --}}
{{--  --}}
{{--  --}}
{{--
  web.php ファイルでは、 ユーザ登録のルーティングをこの様に設定してます
  
  ユーザ登録画面表示は、getでアクセスされ、@showRegistrationFormアクションが実行されます
  'signup.get'  というふうに名付けています
  
  ユーザを登録するときには、postでアクセスされ、@registerアクションが実行されます
  'signup.post'
  
  @showRegistrationFormアクション    @registerアクション  も、RegisterControllerコントローラが
  取り込んでいるトレイトで定義されています。
  
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup','Auth\RegisterController@register')->name('signup.post');
 
 --}}