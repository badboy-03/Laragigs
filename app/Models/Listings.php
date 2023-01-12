<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Listings extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['company', 'user_id', 'logo', 'title', 'location', 'email', 'website', 'tags', 'description'];

    public function scopeFilter($query ,array $filter)
    {
        if($filter['tag'] ?? false)
        {
            $tag = request('tag');
            $query
            ->where('tags','like',"%$tag%");
        }
        if($filter['search'] ?? false)
        {
            $search = request('search');
            $query
            ->where('title', 'like',"%$search%")
            ->orWhere('tags', 'like',"%$search%")
            ->orWhere('description', 'like',"%$search%");
        }
    }
    public function user()
    {
        $this->belongsTo(User::class,'user_id');
    }
}
