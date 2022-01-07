<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //use HasFactory;
    protected $fillable = ['title', 'full_text', 'category_id','user_id'];


    // we are creating a statci function and getting the id of the user, global scope, access anywhere
    // the global scope allows us to display articles to non logged in users in the future
    // now we can only see the articles created by specific user
    protected static function booted()
    {
        if (auth()->check()) {
            static::addGlobalScope('user', function (Builder $builder) {
                $builder->where('user_id', auth()->id());
            });
        }
    }
}
