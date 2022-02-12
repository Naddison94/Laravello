<?php

namespace App\Models\Post;

use App\Models\User\User;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, Uuids, SoftDeletes;

    public $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'body',
        'img',
    ];

    public function scopeFilter($query)
    {
        $like = env('DB_CONNECTION') == 'pgsql' ? 'ilike' : 'like';

//        $query->where('category_id', '=', request('category_id'));



        if (request('search') || request('category_id')) {
            $query->where('title', $like, '%' . request('search') . '%')
            ->where('category_id', '=', request('category_id'));
        }
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id')->latest();
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
