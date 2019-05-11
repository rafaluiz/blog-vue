<?php
namespace App;
use App\Models\Post;
use App\Models\Coment;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Profile;
use App\Models\Permission;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'matricula', 'password', 'datanascimento', 'cep', 'logradouro', 'numero', 'complemento',
        'tipo','bairro','cidade','uf','naturalidade','nacionalidade','sexo','cpf','telefone','teleftwo','celular','cadastradopor_id',
    'atualizadopor_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function hasPermission(Permission $permission)
    {
        return $this->hasProfile($permission->profiles);
    }

    public function hasProfile($profile)
    {
        if(is_string($profile) ) {
            return $this->profiles->contains('name', $profile);
        }

        return !! $profile->intersect($this->profiles)->count();
    }
    public function coments(){
    return $this->hasMany(Coment::class);
}
}
