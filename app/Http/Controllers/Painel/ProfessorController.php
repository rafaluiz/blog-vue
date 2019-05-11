<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Profile_User;
use App\Models\Profile;
use App\Models\Titulacoe;
use App\Models\Requirements_professore;
use App\Models\Aluno_professor;
use DB;
use Illuminate\Support\Facades\Hash;
 use Illuminate\Support\Facades\Input;


class ProfessorController extends Controller
{
    private $user;
    protected $totalPage = 10;


    public function __construct(User $user, Request $request)
    {
        $this->model = $user;
        $this->request = $request;
        $this->route = 'painel.professores.index';
        $this->redirectCad = 'painel.professores.create-edit';

        $this->middleware('can:users')
                ->except(['showProfile', 'updateProfile']);
    }



    public function index()
    {
        $title = 'Listagem dos Professores';

        //$data = $this->model->paginate($this->totalPage);
        $data = DB::table('users')
                ->where('tipo', '=', 'professor')->paginate($this->totalPage);

        return view('painel.professores.index', compact('data', 'title'));

    }



    public function create()
    {
        $title = 'Cadastrar Novo Professor';
        $titulacoes = Titulacoe::get();
        $users = Titulacoe::get();


        return view('painel.professores.create-edit', compact('title','titulacoes','users'));
    }


    /*public function store(UserFormRequest $request)
    {
        //Pega todos os dados do usuário
        $dataUser = $request->all();

        //Criptografa a senha
        $dataUser['password'] = bcrypt($dataUser['password']);

        //Verifica se existe a imagem
        if( $request->hasFile('image') ) {
            //Pega a imagem
            $image = $request->file('image');

            //Define o nome para a imagem
            $nameImage = uniqid(date('YmdHis')).'.'.$image->getClientOriginalExtension();

            $upload = $image->storeAs('users', $nameImage);

            if( $upload )
                $dataUser['image'] = $nameImage;
            else
                return redirect('/painel/alunos/create')
                            ->withErrors(['errors' => 'Erro no Upload'])
                            ->withInput();
        }

        //Insere os dados do usuário
        $insert = $this->model->create($dataUser);

        if( $insert )
            return redirect()
                        ->route('usuarios.index')
                        ->with(['success' => 'Cadastro realizado com sucesso!']);
        else
            return redirect()->route('usuarios.create')
                            ->withErrors(['errors' => 'Falha ao cadastrar!'])
                            ->withInput();
    }
     *
     */
    protected function store(Request $request)
    {

      $title = 'Listagem dos Usuários';

      $data = DB::table('users')
              ->where('tipo', '=', 'professores')->paginate($this->totalPage);

        //dd($request);
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'tipo' => $request['tipo'],
            'matricula' => $request['matricula'],
            'numero' => $request['numero'],
            'complemento' => $request['complemento'],
            'bairro' => $request['bairro'],
            'cpf' => $request['cpf'],
            'datanascimento' => $request['datanascimento'],
            'cep' => $request['cep'],
            'numero' => $request['numero'],
            'cidade' => $request['cidade'],
            'uf' => $request['uf'],
            'naturalidade' => $request['naturalidade'],
            'nacionalidade' => $request['nacionalidade'],
            'sexo' => $request['sexo'],
            'telefone' => $request['telefone'],
            'teleftwo' => $request['teleftwo'],
            'celular' => $request['celular'],
            'logradouro' => $request['logradouro'],

        ]);

        $user->id;
        $profile_user = Profile_User::create([
            'profile_id' => 6,
            'user_id' => $user->id,
        ]);

        $requirements_professores = Requirements_professore::create([
            'titulacoe_id' => $request['id_titulacoe'],
            'graduacoes' => $request['graduacoes'],
            'posgraduacoes' => $request['posgraduacoes'],
            'mestrado' => $request['mestrado'],
            'doutorado' => $request['doutorado'],
            'posdoutorado' => $request['posdoutorado'],
            'description' => $request['description'],
            'user_id' => $user->id,
        ]);

        return view('painel.professores.index', compact('title', 'data'));

    }


    public function show($id)
    {
        //Recupera o usuário
        $data = $this->model->find($id);

        $title = "Usuário: {$data->name}";

        return view('painel.professores.show', compact('data', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Recupera o usuário pelo id
        //$data = $this->model->find($id);
        $titulacoes = Titulacoe::get();
      //  $title = "Editar Usuário: {$data->name}";
        $data = $this->model->find($id)

                       ->where('users.id', '=' , $id)
                       ->join('requirements_professores', 'users.id', '=' , 'requirements_professores.user_id')
                    //   ->join('cursos', 'cursos.id', '=' , 'requirements.curso_id')
                       ->select('users.id', 'users.name','users.email','users.tipo','users.matricula', 'users.numero', 'users.complemento',
                        'users.cep','users.bairro','users.cpf','users.datanascimento','users.cep','users.cidade','users.uf','users.naturalidade','users.nacionalidade',
                        'users.sexo','users.telefone','users.teleftwo','users.celular','users.logradouro','requirements_professores.graduacoes','requirements_professores.posgraduacoes'
                        ,'requirements_professores.mestrado','requirements_professores.doutorado','requirements_professores.posdoutorado','requirements_professores.description'
                        ,'requirements_professores.titulacoe_id','requirements_professores.user_id')
                       ->first();
                      //var_dump($data);

        return view('painel.professores.create-edit', compact('data','titulacoes'));
    }


    public function update($id)
    {
      $dataUser = $this->request->all();
      $item = $this->model->find($id);

      if( isset($dataUser['password']) && $dataUser['password'] != '' )
            $dataUser['password'] = bcrypt($dataUser['password']);

      DB::beginTransaction();

      $UpdateDetails = Requirements_professore::where('user_id', $id)->first();

      if (is_null($UpdateDetails)) {

          Requirements_professore::create([
            'titulacoe_id' => $dataUser['id_titulacoe'],
            'graduacoes' => $dataUser['graduacoes'],
            'posgraduacoes' => $dataUser['posgraduacoes'],
            'mestrado' => $dataUser['mestrado'],
            'doutorado' => $dataUser['doutorado'],
            'posdoutorado' => $dataUser['posdoutorado'],
            'description' => $dataUser['description'],
            'user_id' =>  $id,
          ]);

      }else {

        $updateRequeriment = $UpdateDetails->update($dataUser);

      }

      $update = $item->update($dataUser);

          if($update)
          {
              DB::commit();
              return redirect ("painel\professores");

          }else{

              DB::rollBack();
              return redirect ("painel\professores\create")
                                  ->withErrors(['errors' => 'Falha ao Cadastrar'])
                                  ->withInput();
          }

    }

    public function destroy($id)
    {
        //Recupera o usuário
        $data = $this->model->find($id);

        //deleta
        $delete = $data->delete();

        if( $delete ) {
            return redirect()->route('professores.index');
        } else {
            return redirect()->route('professores.show', ['id' => $id])
                                        ->withErrors(['errors' => 'Falha ao deletar']);
        }
    }


    public function search(Request $request)
    {
        //Recupera os dados do formulário
        $dataForm = $request->except('_token');

        //Filtra os usuários
        $data = $this->model
                    ->where('name', 'LIKE', "%{$dataForm['key-search']}%")
                    ->orWhere('email', $dataForm['key-search'])
                    ->paginate($this->totalPage);

        return view('painel.professores.index', compact('data', 'dataForm'));
    }



    public function showProfile()
    {
        //Recupera o usuário
        $data = auth()->user();

        $title = 'Meu Perfil';

        return view('painel.professores.profile', compact('data', 'title'));
    }



    public function updateProfile(UserFormRequest $request, $id)
    {
        $this->authorize('update_profile', $id);

        //Pega todos os dados do usuário
        $dataUser = $request->all();

        //Cria o objeto de usuário
        $data = $this->model->find($id);

        //Criptografa a senha
        $dataUser['password'] = bcrypt($dataUser['password']);

        //Remove o e-mail do usuário para não atualizar
        unset($dataUser['email']);

        //Verifica se existe a imagem
        if( $request->hasFile('image') ) {
            //Pega a imagem
            $image = $request->file('image');

            //Verifica se o nome da imagem não existe
            if( $data->image == '' ){
                $nameImage = uniqid(date('YmdHis')).'.'.$image->getClientOriginalExtension();
                $dataUser['image'] = $nameImage;
            }else {
                $nameImage = $data->image;
                $dataUser['image'] = $data->image;
            }

            $upload = $image->storeAs('users', $nameImage);

            if( !$upload )
                return redirect()->route('profile')
                                            ->withErrors(['errors' => 'Erro no Upload'])
                                            ->withInput();
        }


        //Altera os dados do usuário
        $update = $data->update($dataUser);

        if( $update )
            return redirect()
                        ->route('profile')
                        ->with(['success' => 'Perfil atualizado com sucesso']);
        else
            return redirect()->route('profile')
                                        ->withErrors(['errors' => 'Falha ao atualizar o perfil.'])
                                        ->withInput();
    }

    public  function users($id)
    {
      $title = "Vincular o Professor ao Aluno:";

      $professor_id = $id;


      $users = DB::table('users')
              ->where('tipo', '=', 'aluno')
                       ->select('users.id', 'users.name','users.email')
                       ->get();

        return view('painel.professores.users', compact('users', 'title', 'professor_id'));
    }

      public function usersAddProfile(Request $request,User $users)
      {

      $dataUser = $this->request->all();
      $users = $this->request->get('users');

        foreach ($users as $key => $value) {
          if(!$users[$key] ==  ""){
            $concatenar[] = [
              'aluno_id' => $users[$key],
              'professor_id' => $dataUser['professor_id'],
            ];
          }
        }
  
        $insert = Aluno_professor::insert($concatenar);

        return redirect()->route('professores.index')->with(['success' => 'Vinculo realizado com sucesso!']);

      }


}
