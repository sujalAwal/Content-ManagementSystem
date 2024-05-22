<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    
    protected $fillable =['user_id','galleries_id','categories_id','title','description','is_publish'];

    public function gallary (){
            // return $this->belongsTo("App/Models/Gallery");

            // return $this->belongsTo(gallery::class,'foreign key','primary key')
            return $this->belongsTo(gallery::class,'galleries_id','id');
    }

    public function category(){
        return $this->belongsTo(Categorie::class,'categories_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    
}
