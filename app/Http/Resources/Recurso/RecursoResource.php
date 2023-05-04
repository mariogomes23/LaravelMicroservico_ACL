<?php

namespace App\Http\Resources\Recurso;

use App\Http\Resources\PermissionResource;
use App\Models\Recurso;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RecursoResource extends JsonResource
{

    public $collects = Recurso::class;
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "name" =>$this->name,
            "permissions"=>PermissionResource::collection($this->permissions)
        ];
    }
}
