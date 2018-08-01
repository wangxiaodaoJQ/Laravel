<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'category_id',
        'reply_count',
        'view_count',
        'last_reply_user_id',
        'order',
        'excerpt',
        'slug',
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
    * 话题排序。
    *
    * @param \Illuminate\Database\Eloquent\Builder $builder
    * @param null                                  $order
    *
    * @return \Illuminate\Database\Eloquent\Builder
    */
    public function scopeWithOrder(Builder $builder, $order = null)
    {
        if ($order === 'recent') {
            $builder->createDesc();
        } else {
            $builder->updateDesc();
        }
        return $builder->with('user', 'category');
    }

    /**
    * 话题详情链接。
    *
    * @param array $args
    *
    * @return string
    */
    public function link($args = [])
    {
        return route('topics.show', array_merge([$this->id, $this->slug], $args));
    }

}
