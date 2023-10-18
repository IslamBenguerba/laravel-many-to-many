<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function categories(){
        return $this->hasOne(Categorie::class, 'categorie_id');
    }
}
