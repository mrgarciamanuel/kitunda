<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','price','description','category_id'];

    //relação entre as tabelas Users e a Products
    //a relação é possível através do model da tabela de Utilizadores que foi importado em cima
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //relação entre as tabelas Categories e a Products
    //a relação é possível através do model da tabela de Categories que foi importado em cima
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
