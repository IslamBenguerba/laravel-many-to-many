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
        'link_git_hub',
        'update_date',
        'image'
    ];
}
