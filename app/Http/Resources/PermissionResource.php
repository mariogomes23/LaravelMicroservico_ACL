<?php

namespace App\Http\Resources;

use App\Http\Resources\Recurso\RecursoResource;
use App\Models\Permissoe;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PermissionResource extends JsonResource
{
    public $collects = Permissoe::class;
    public function toArray(Request $request): array
    {
        return [

            "id"=>$this->id,
            "name"=>$this->name,

        ];
    }
}
