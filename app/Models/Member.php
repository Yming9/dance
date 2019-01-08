<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{


    public $typeText = [
        0 => '普通用户',
        1 => '关注用户',
        2 => '小咖用户'
    ];

    public $typeCss = [
        0 => 'label-default',
        1 => 'label-primary',
        2 => 'label-danger',
    ];

    public function note()
    {
        return $this->hasMany(Note::class);
    }
    public function novel_comment()
    {
        return $this->hasMany(Novel_comment::class);
    }
    public function comment_replys()
    {
        return $this->hasMany(Comment_replys::class);
    }

    public function be_comment_replys()
    {
        return $this->hasMany('App\Models\Comment_replys','be_member_id');
    }

    public function quizze()
    {
        return $this->hasMany(Quizze::class);
    }

    public function quizpraise()
    {
        return $this->hasMany(QuizPraise::class);
    }

    public function quizzespraise()
    {
        return $this->hasMany(QuizzesPraise::class);
    }

    public function quizcomment()
    {
        return $this->hasMany(QuizComment::class);
    }
}
