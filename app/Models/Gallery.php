<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
    public $uploads ='images/post/';
    use HasFactory;
    protected $fillable =['image'];
    
    protected function image():Attribute{
        return Attribute::make(
            get:fn($image) => $this->uploads.$image,
        );
    }
}
