<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PermissionResource;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionUserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;

    }
    //
    public function UserPermission($id)
    {
        $user = $this->user
                      ->where("uuid",$id)
                      ->with("permissions")
                      ->firstOrFail();

        return PermissionResource::collection($user->permissions);
    }

    public function addPermissionUser(Request $request)
    {
        $user = $this->user->where("uuid",$request->id)->firstOrFail();
        $user->permissions()->attach($request->permissions);
        return response()->json([
            "message" =>"success"
        ]);

    }

    public function verificarPermissao(Request $request,$name)
    {
        $user = $request->user();
      if($user->hasPermission($name))
      {
        return response()->json([
            "message" =>"sucesso"
        ]);
      }
      else{

        return response()->json([
            "message" =>"erro"
        ]);
      }


    }

    public function hasSuperAdmin()
    {
       // return in_array($this->email,config("acl.admins"));
    }
}
