<?php
namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Permission;
use App\Models\Profile;

class PermissionController extends StandardController
{
    protected $model;
    protected $name         = 'Permission';
    protected $view         = 'painel.permissions';
    protected $route        = 'permissoes';
    protected $totalPage    = 10;

    public function __construct(Permission $permission)
    {
        $this->model = $permission;

        $this->middleware('can:permissions');
    }

    public function profiles($id)
    {
        $permission = $this->model->find($id);

        $profiles = $permission->profiles()->paginate($this->totalPage);

        $title = "Perfis com a permissão: {$permission->name}";

        return view('painel.permissions.profiles', compact('permission', 'profiles', 'title'));
    }

    public function profilesAdd($id)
    {
        $permission = $this->model->find($id);

        $profiles = Profile::whereNotIn('id', function($query) use ($permission){
            $query->select("permission_profile.profile_id");
            $query->from("permission_profile");
            $query->whereRaw("permission_profile.permission_id = {$permission->id}");
        })->get();

        $title = "Vincular Perfil a Permissão: {$permission->name}";

        return view('painel.permissions.profile-add', compact('permission', 'profiles', 'title'));
    }

    public function profilesAddPermission(Request $request, $id)
    {
        $permission = $this->model->find($id);

        $permission->profiles()->attach($request->get('profiles'));

        return redirect()
                ->route('permissao.perfis', $id)
                ->with(['success' => 'Vinculo realizado com sucesso!']);
    }

    public function deleteProfile($id, $profileId)
    {
        $permission = $this->model->find($id);

        $permission->profiles()->detach($profileId);

        return redirect()
                ->route('permissao.perfis', $id)
                ->with(['success' => 'Removido com sucesso!']);
    }

    public function searchProfile(Request $request, $id)
    {
        $dataForm = $request->except('_token');

        $permission = $this->model->find($id);

        //Filtra os dados
        $profiles = $permission
                ->profiles()
                ->where('profiles.name', 'LIKE', "%{$dataForm['key-search']}%")
                ->orWhere('profiles.label', 'LIKE', "%{$dataForm['key-search']}%")
                ->paginate($this->totalPage);

        return view('painel.permissions.profiles', compact('permission', 'dataForm', 'profiles'));
    }
}
