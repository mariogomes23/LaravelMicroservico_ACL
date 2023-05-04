<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PermissionResource;
use App\Models\Permissoe;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    private $model;

    public function __construct(Permissoe $permissao)
    {
        $this->model = $permissao;

    }


    public function index()
    {
        $permissao = $this->model->paginate();

        return   PermissionResource::collection($permissao);
        //
    }


    public function store(Request $request)
    {



        $permissao = $this->model->create([
            "name"=>$request->name,

        ]);

        return new PermissionResource($permissao);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $permissao = $this->model->where("id",$id)->firstOrFail();
        return new PermissionResource($permissao);
        //
    }
    public function update(Request $request, string $id)
    {
        //
        $permissao = $this->model->where("id",$id)->firstOrFail();
        $permissao->update([
            "name"=>$request->name,

        ]);

        return new PermissionResource($permissao);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permissao = $this->model->where("id",$id)->firstOrFail();
        $permissao->delete();

        return new PermissionResource($permissao);
        //
    }
}
