<?php

namespace App\Models\Task;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, Uuids, SoftDeletes;

    public $table = 'tasks';

//    /**
//     * The attributes that are mass assignable.
//     *
//     * @var array
//     */
//    protected $fillable = [
//        'user_id',
//        'category_id',
//        'title',
//        'body',
//        'img',
//    ];
//
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
//
//    public function comments()
//    {
//        return $this->hasMany(Comment::class, 'post_id')->whereNull('reply_id')->latest();
//    }
}
