<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //relação a tabela Categories e a tabela de Produtos, a relação é feita graças ao model da tabela de Produtos que foi importante em cima
    public function products(){
        return $this->hasMany(Product::class);
    }
}
