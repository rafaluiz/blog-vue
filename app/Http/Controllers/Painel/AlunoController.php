<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Profile_User;
use App\Models\Requirement;
use App\Models\Curso;
use App\Models\Instituicoe;
use App\Models\Profile;
use DB;
use Illuminate\Support\Facades\Hash;

class AlunoController extends Controller
{
    private $user;
    protected $totalPage = 10;


    public function __construct(User $user, Request $request)
    {
        $this->model = $user;
        $this->request = $request;
        $this->route = 'painel.alunos.index';
        $this->redirectCad = 'painel.alunos.create-edit';

        $this->middleware('can:users')
                ->except(['showProfile', 'updateProfile']);
    }


    public function index()
    {
        $title = 'Listagem dos Alunos';

        //$data = $this->model->paginate($this->totalPage);
        $data = DB::table('users')
                ->where('tipo', '=', 'aluno')->paginate($this->totalPage);

        return view('painel.alunos.index', compact('data', 'title'));

    }



    public function create()
    {
        $title = 'Cadastrar Novo Usuário';
        $cursos = Curso::get();
        $instituicoes = instituicoe::get();

        return view('painel.alunos.create-edit', compact('title','cursos','instituicoes'));
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
              ->where('tipo', '=', 'aluno')->paginate($this->totalPage);

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
            'profile_id' => 5,
            'user_id' => $user->id,
        ]);

        $requirement = Requirement::create([
            'curso_id' => $request['id_curso'],
            'instituicoe_id' => $request['id_instituicoe'],
            'description' => $request['description'],
            'inicioprocesso' => $request['inicioprocesso'],
            'previsaoprojeto' => $request['previsaoprojeto'],
            'previsaofinal' => $request['previsaofinal'],
            'user_id' => $user->id,
        ]);

        return view('painel.alunos.index', compact('title', 'data'));

    }


    public function show($id)
    {
        //Recupera o usuário
        $data = $this->model->find($id);

        return view('painel.usuarios.show', compact('data', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cursos = Curso::get();
        $instituicoes = instituicoe::get();

        $data = $this->model->find($id)

          ->where('users.id', '=' , $id)
            ->leftjoin('requirements', 'users.id', '=' , 'requirements.user_id')
            ->select('users.id', 'users.name','users.email','users.tipo','users.matricula', 'users.numero', 'users.complemento',
            'users.cep','users.bairro','users.cpf','users.datanascimento','users.cep','users.cidade','users.uf','users.naturalidade','users.nacionalidade',
            'users.sexo','users.telefone','users.teleftwo','users.celular','users.logradouro','requirements.description','requirements.inicioprocesso','requirements.previsaoprojeto','requirements.previsaofinal'
            ,'requirements.curso_id','requirements.instituicoe_id','requirements.user_id')
          ->first();

      return view('painel.alunos.create-edit', compact('data','cursos','instituicoes'));
    }


    public function update($id)
    {
      $dataUser = $this->request->all();
      $item = $this->model->find($id);

      if( isset($dataUser['password']) && $dataUser['password'] != '' )
            $dataUser['password'] = bcrypt($dataUser['password']);

      DB::beginTransaction();

      $UpdateDetails = Requirement::where('user_id', $id)->first();

      if (is_null($UpdateDetails)) {

          Requirement::create([
            'curso_id' => $dataUser['id_curso'],
            'instituicoe_id' => $dataUser['id_instituicoe'],
            'description' => $dataUser['description'],
            'inicioprocesso' => $dataUser['inicioprocesso'],
            'previsaoprojeto' => $dataUser['previsaoprojeto'],
            'previsaofinal' => $dataUser['previsaofinal'],
            'user_id' =>  $id,
          ]);

      }else {

        $updateRequeriment = $UpdateDetails->update($dataUser);

      }

      $update = $item->update($dataUser);

          if($update)
          {
              DB::commit();
              return redirect ("painel\alunos");

          }else{

              DB::rollBack();
              return redirect ("painel\alunos\create")
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
            return redirect()->route('alunos.index');
        } else {
            return redirect()->route('alunos.show', ['id' => $id])
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

        return view('painel.alunos.index', compact('data', 'dataForm'));
    }



    public function showProfile()
    {
        //Recupera o usuário
        $data = auth()->user();

        $title = 'Meu Perfil';

        return view('painel.alunos.profile', compact('data', 'title'));
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
}
