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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function priority()
    {
        return $this->hasOne(Priority::class, 'id', 'priority_id');
    }

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }
}
