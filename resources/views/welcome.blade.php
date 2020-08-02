@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <h1>Welcome to the Microposts</h1>
        </div>
    </div>
@endsection





{{--  
    'layouts.app' としてるのは、resources/viewsフォルダ以下を表しています。
    
    この welcome.blade.phpは、layoutsフォルダの app.blade.phpファイルを継承してる
    
        フォルダ名.ファイル名 と指定します
        
      @section('content')   と     @endsection の間に書かれたものが、
      layoutsフォルダの app.blade.phpファイルの   @yield('content')  のところに入ります


--}}




{{-- Bladeでのコメントです  --}}
{{--  --}}
{{--  --}}
{{--  --}}