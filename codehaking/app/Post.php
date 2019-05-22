<?php

namespace App;


use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    use Sluggable;
    

    protected $fillable =[

        'user_id',
    	'category_id',
    	'photo_id',
    	'title',
    	'body',
        'slug'

    ];

   public function sluggable() {
        return [
            'slug' => [
                'source' => 'title',
                'save_to'=> 'slug',
                'separator' => '-',
            ],
        ];
    }

    public function user(){

        return $this->belongsTo('App\User');

    }

    public function photo(){

        return $this->belongsTo('App\Photo');

    }

    public function category(){

        return $this->belongsTo('App\Category');

    }

    public function comment(){

        return $this->hasMany('App\Comment');
    }

    public function photoPlaceholder(){

        return "http://placehold.it/700x400";

    }
}
