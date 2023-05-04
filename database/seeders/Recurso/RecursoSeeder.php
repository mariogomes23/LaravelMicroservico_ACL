<?php

namespace Database\Seeders\Recurso;

use App\Models\Recurso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $recursosEmpresa = Recurso::create(["name" =>"empresa"]);
        $recursosEmpresa->permissions()->create(["name"=>"index Empresa"]);
        $recursosEmpresa->permissions()->create(["name"=>"show Empresa"]);
        $recursosEmpresa->permissions()->create(["name"=>"create Empresa"]);
        $recursosEmpresa->permissions()->create(["name"=>"edit Empresa"]);
        $recursosEmpresa->permissions()->create(["name"=>"update Empresa"]);
        $recursosEmpresa->permissions()->create(["name"=>"delete Empresa"]);

        $recursosLoja= Recurso::create(["name" =>"loja"]);
        $recursosLoja->permissions()->create(["name"=>"index loja"]);
        $recursosLoja->permissions()->create(["name"=>"show loja"]);
        $recursosLoja->permissions()->create(["name"=>"create loja"]);
        $recursosLoja->permissions()->create(["name"=>"edit loja"]);
        $recursosLoja->permissions()->create(["name"=>"update loja"]);
        $recursosLoja->permissions()->create(["name"=>"delete loja"]);


    }
}
