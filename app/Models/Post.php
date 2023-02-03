<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $with = ['category', 'author','comments'];
    public $guarded = [];

    public function scopeFilter($query, array $filters)
    {
        $query
            ->when(
                $filters['search'] ?? false,
                fn ($query, $search) =>
                $query->where(
                    fn ($query) =>
                    $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('slug', 'like', '%' . $search . '%')
                )
            )
            ->when($filters['category'] ?? false, fn ($query, $category) =>
            $query->whereHas(
                'category',
                fn ($query) =>
                $query->where('name', $category)
            ))
            ->when($filters['author'] ?? false ,fn($query,$author)=>
                $query->whereHas('author',fn($query)=>
                    $query->where('name',$author)
                )
        );
    }

    // select * from `posts` where (`title` = 'facilis' or `body` = 'facilis') and exists (select * from `categories` where `posts`.`category_id` = `categories`.`id` and `slug` = 'Aliquam-et-dolores-quo') order by `created_at` desc

    // select * from `posts` where (`title` like '%facilis%' or `body` like '%facilis%') and exists (select * from `categories` where `posts`.`category_id` = `categories`.`id` and `slug` = 'Aliquam-et-dolores-quo') order by `created_at` desc



    // function scopeFilter($query, array $filters)
    // {


    //     $query
    //         ->when($filters['search'] ?? false, fn ($query, $search) =>
    //         $query
    //             ->where(fn($query)=>
    //             $query->where('title', 'like', '%' . $search . '%')
    //             ->orWhere('body', 'like', '%' . $search . '%')))

    //         ->when($filters['category'] ?? false, fn ($query, $category) =>
    //         $query
    //             ->whereHas(
    //                 'category',
    //                 fn ($query) =>
    //                 $query->where('slug', $category)
    //             ));

    //     // if($filters['search'] ?? false){
    //     //     $query->where(fn($query)=>
    //     //         $query
    //     //         ->where('title','like','%'.request('search').'%')
    //     //         ->orWhere('body','like','%'.request('search').'%'));
    //     // }

    //     // if($filters['category'] ?? false){
    //     //     $query
    //     //         ->whereHas('category',fn($query)=>
    //     //             $query->where('slug',request('category'))
    //     //         );
    //     // }
    // }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
