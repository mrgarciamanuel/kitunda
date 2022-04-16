<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Inserindo dados na base de dados
        DB::table('products')->insert([
            [
            'name'=> 'Cebola',
            "price"=> "300",
            "description"=>"Cebola nacional, altamente saudavel saudavel, produzido na provícia de benguela",
            "category"=> "legume",
            "gallery"=>"https://www.joiadocampo.com/wp-content/uploads/2016/10/cebola-50-nova-origem-portugal.jpg"


            ],
            [

            'name'=> 'Alho',
            "price"=> "400",
            "description"=>"Alho nacional, altamente saudavel saudavel, produzido na provícia de benguela",
            "category"=> "legume",
            "gallery"=>"https://www.joiadocampo.com/wp-content/uploads/2016/10/alho-seco-1a-origem-espanha.jpg"

            ],

            [
            'name'=> 'Batata agria',
            "price"=> "400",
            "description"=>"Batata nacional, altamente saudavel saudavel, produzido na provícia de benguela",
            "category"=> "tuberculo",
            "gallery"=>"https://www.joiadocampo.com/wp-content/uploads/2016/10/batata-agria.jpg"

            ]
        ]);


    }
}
