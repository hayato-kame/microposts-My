
{{-- Bladeでのコメントです  --}}
{{--  --}}


{{--'login.post'   は、  LoginController@login   LoginControllerコントローラの @loginアクション です  --}}


{{--   'layouts.app'   は、resouces/viewフォルダ以下の フォルダ名.ファイル名です--}}


@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Log in</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            {!!  Form::open(['route => 'login.post']) !!}
            
                <div class="form-group">
                    {!!  Form::label('email', 'Email') !!}
                    {!!  Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!!  Form::password('password', ['class' => 'form-control']) !!}
                </div>
            
                {!!  Form::submit('Log in',['class' => 'btn btn-primary btn-block']  !!}
            
            {!! Form::close()  !!}
            
            {{--  ユーザ登録ページへのリンク  --}}
            <p class="mt-2">
                New user?
                {!! link_to_route('signup.get', 'Sign up now!')  !!}
            </p>
            
        </div>
    </div>


@endsection



{{-- 

グリッドシステム

レイアウトを格子状に分解して配置するデザイン手法

Bootstrapでは横幅を12分割したグリッドシステムを採用

原則

class = “container”（固定枠）または”container-fluid”（流動枠）の中に書く
class = “row”の中に書く
class = “col-{prefix}-{columns}”の形で書く
class = {columns}は合計が12になるようにする


prefixとブレークポイント

Bootstrapではデフォルトで3つのブレークポイントが設定されています

配置ルールに書いてある「規定の画面幅を下回ると縦並びになる」

基本は前述の通り、カラムの合計は12になるように指定

カラム数の合計が12より少ない
単純に左詰めで表示されます。


カラム数の合計が12より多い
改行されて表示されます。

カラムの塊がちょうど12の区切りのところに来てしまった場合はその塊ごと改行されます。
(塊が分割されるわけではありません)

prefix複数指定
空白で区切れば複数指定することができます。

コード

<!--<div class="row">-->
<!--  <div class="col-sm-3 col-xs-6">.col-sm-3 .col-xs-6</div>-->
<!--  <div class="col-sm-3 col-xs-6">.col-sm-3 .col-xs-6</div>-->
<!--  <div class="col-sm-3 col-xs-6">.col-sm-3 .col-xs-6</div>-->
<!--  <div class="col-sm-3 col-xs-6">.col-sm-3 .col-xs-6</div>-->
<!--</div>-->



入れ子カラム
入れ子になった場合、内側に入っている.rowは画面サイズを基準にして12分割するのではなく、親のセルサイズを基準にして12分割してレイアウトします。

コード
<!--<div class="row">-->
<!--  <div class="col-sm-8">親: .col-sm-8-->
<!--    <div class="row">-->
<!--      <div class="col-sm-5">子: .col-sm-5</div>-->
<!--      <div class="col-sm-7">子: .col-sm-7</div>-->
<!--    </div>-->
<!--  </div>-->
<!--  <div class="col-sm-4">親: .col-sm-4</div>-->
<!--</div>-->


カラム間に隙間を作る
col-{prefix}-offset-{columns}という形で記述し、columnsのところに作りたい隙間のカラム数を記入します。

パターン1
コード1

<!--<div class="row">-->
<!--  <div class="col-md-3">col-md-3</div>-->
<!--  <div class="col-md-6 col-md-offset-3">col-md-6 col-md-offset-3</div>-->
<!--</div>-->
--}}