<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    //  作成したモデルファイルに $fillable を設定しておきましょう
    // そして、モデルファイルの中にも一対多の関係を記述しておきましょう。
    // Micropostを持つUserは1人であるため、
    // function user() のように単数形userでメソッドを定義し、
    // 中身は return $this->belongsTo(User::class) とします。
    // このようにすることで、
// Micropostのインスタンスが所属している唯一のUser（投稿者の情報）を
    // $micropost->user()->first() 
    // もしくは $micropost->user という簡単な記述で取得できるようになります。

    
    protected $fillable = ['content'];
    
    /**
     *  この投稿を所有するユーザ
     * Userモデルとの関係を定義する
     * 
     * user()  というふうに単数形でメソッド名を付けます
     * ひとりのユーザが所有しているからです
     */
     
     public function user()
     {
         return $this->belongsTo(User::class);
         
     }


    /**
     * Micropostの数をカウントする機能を追加
Userが持つMicropostの数をカウントするためのメソッドも
作成しておきます。
loadCount メソッドの引数に指定しているのはリレーション名です
。先ほどモデル同士の関係を表すメソッドを定義しましたが、
そのメソッド名がリレーション名になります。
これによりUserのインスタンスに {リレーション名}_count プロパティが追加され
、件数を取得できるようになります。
     * 
     */ 
    
    
    /**
     * このユーザに関係するモデルの件数をロードする。
     * 
     * これをアクションで $user->loadRelationshipCounts() のように呼び出した後
     * 、ビューで $user->microposts_count のように件数を取得することになります。
     * 
     */
     public function loadRelationshipCounts()
     {
         $this->loadCount('microposts');
     }
    
    
    
    
}
