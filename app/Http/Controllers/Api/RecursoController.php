<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Recurso\RecursoResource;
use App\Models\Recurso;
use Illuminate\Http\Request;

class RecursoController extends Controller
{

    private $model;

    public function __construct(Recurso $recurso)
    {
        $this->model = $recurso;

    }


    public function index()
    {
        $recurso = $this->model->with("permissions")->paginate();

        return RecursoResource::collection($recurso);
        //
    }


    public function store(Request $request)
    {



        $recurso = $this->model->create([
            "name"=>$request->name,

        ]);

        return new RecursoResource($recurso);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $recurso = $this->model->where("id",$id)->firstOrFail();
        return new RecursoResource($recurso);
        //
    }
    public function update(Request $request, string $id)
    {
        //
        $recurso = $this->model->where("id",$id)->firstOrFail();
        $recurso->update([
            "name"=>$request->name,

        ]);

        return new RecursoResource($recurso);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $recurso = $this->model->where("id",$id)->firstOrFail();
        $recurso->delete();

        return new RecursoResource($recurso);
        //
    }
}
