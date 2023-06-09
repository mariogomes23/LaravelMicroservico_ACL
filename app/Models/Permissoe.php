<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissoe extends Model
{
    use HasFactory;

    protected $fillable = ["name"];


    public function recurso()
    {
        return $this->hasMany(Recurso::class);
    }

    public function users()
    {

        return $this->belongsToMany(User::class);

    }

}
