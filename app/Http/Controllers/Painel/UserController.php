<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\Painel\UserFormRequest;

class UserController extends Controller
{
    private $user;
    protected $totalPage = 10;


    public function __construct(User $user)
    {
        $this->model     = $user;

        $this->middleware('can:users')
                ->except(['showProfile', 'updateProfile']);
    }


    public function index()
    {
        $title = 'Listagem dos Usuários';

        $data = $this->model->paginate($this->totalPage);

        return view('painel.users.index', compact('data', 'title'));

    }



    public function create()
    {
        $title = 'Cadastrar Novo Usuário';


        return view('painel.users.create-edit', compact('title'));
    }


    public function store(UserFormRequest $request)
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
                return redirect('/painel/usuarios/create')
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


    public function show($id)
    {
        //Recupera o usuário
        $data = $this->model->find($id);

        $title = "Usuário: {$data->name}";

        return view('painel.users.show', compact('data', 'title'));
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
        $data = $this->model->find($id);

        $title = "Editar Usuário: {$data->name}";

        return view('painel.users.create-edit', compact('data', 'title'));
    }


    public function update(UserFormRequest $request, $id)
    {
        //Pega todos os dados do usuário
        $dataUser = $request->all();

        //Cria o objeto de usuário
        $data = $this->model->find($id);

        //Criptografa a senha
        if( isset($dataUser['password']) && $dataUser['password'] != '' )
            $dataUser['password'] = bcrypt($dataUser['password']);

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
                return redirect()->route('usuarios.edit', ['id' => $id])
                                            ->withErrors(['errors' => 'Erro no Upload'])
                                            ->withInput();
        }


        //Altera os dados do usuário
        $update = $data->update($dataUser);

        if( $update )
            return redirect()
                        ->route('usuarios.index')
                        ->with(['success' => 'Alteração realizada com sucesso!']);
        else
            return redirect()->route('usuarios.edit', ['id' => $id])
                                        ->withErrors(['errors' => 'Falha ao editar'])
                                        ->withInput();
    }


    public function destroy($id)
    {
        //Recupera o usuário
        $data = $this->model->find($id);

        //deleta
        $delete = $data->delete();

        if( $delete ) {
            return redirect()->route('usuarios.index');
        } else {
            return redirect()->route('usuarios.show', ['id' => $id])
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

        return view('painel.users.index', compact('data', 'dataForm'));
    }



    public function showProfile()
    {
        //Recupera o usuário
        $data = auth()->user();

        $title = 'Meu Perfil';

        return view('painel.users.profile', compact('data', 'title'));
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
