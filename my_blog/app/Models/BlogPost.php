<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    // si la cle primaire est differente de celle par defaut (id), il faut la déclarer
    //protected $primaryKey = 'blog_id'

    // si on ne veux pas utiliser les timestamps
    //protected $timestamp = false;

    // les champs modifiables
    protected $fillable = ['title', 'body', 'user_id'];

    // models liés (/->chemin web) (\->chemin ordi)
    public function blogHasUser(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
