<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class Categorie extends Model
{
    use HasFactory;

    public function project(){
        return $this->belongsToMany(Project::class);

    }
}
