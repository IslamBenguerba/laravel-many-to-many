<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Technology;
class Project extends Model
{
    use HasFactory;
    protected $fillable =[
        'titolo',
        'descrizione',
        'link_git',
        'update_date',
        'image',
        'categorie_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'categorie_id');
    }
    public function technologies() {
        return $this->belongsToMany(Technology::class);
    }
}
