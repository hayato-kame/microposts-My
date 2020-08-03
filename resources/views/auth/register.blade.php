{{-- Bladeでのコメントです  --}}
{{--  --}}
{{--  --}}
{{-- 

ユーザ登録の機能を作ろうとしています
。ModelとControllerは最初から用意されており、
Routingの設定は先ほど行いました。
あとは用意されていない auth/ フォルダと
register.blade.php を作成するだけでユーザ登録が動作します

RegistersUsersトレイトを見ると
showRegistrationForm() メソッドが定義されており、
中には return view('auth.register');
の1行だけが記述されていることがわかります。
showRegistrationForm() アクションは、
ただ単に resources/views/auth/register.blade.php を表示するアクションだ
ということです
。ただし、このビューのファイルは作成されていません
用意されていない auth/ フォルダと register.blade.php を作成
なので作成しました

--}}

@extends('layouts.app')


@section('content')
    <div class="text-center">
        <h1>Sign up</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            {!! Form::open(['route' => 'signup.post'])  !!}
               
                <div class="form-group">
                    {!! Form::label('name','Name')  !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password_confirmation',['class' => 'form-control'])  !!}
                </div>
                
                {!! Form::submit('Sign up', ['class' => 'btn btn-primary btn-block']) !!}
            
            {!! Form::close()  !!}
            
        </div>
    </div>

@endsection

