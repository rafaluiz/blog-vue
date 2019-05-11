<?php

namespace App\Http\Controllers\Posts;
use App\Models\Post;
use App\Models\Aluno_professor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
  protected $view     = 'painel.tarefas';
    private $post;
    public function __construct(Post $post) {
        $this-> post= $post;
    }

    public function index(Post $post){
       if(auth()->user()->id ){

         if( auth()->user()->tipo == "aluno" ) {
           $tipo = 'alunos_professores.aluno_id';
         } else {
           $tipo = 'alunos_professores.professor_id';
         }

         $posts = $this->post
              ->where($tipo, '=' , auth()->user()->id)
                ->leftjoin('alunos_professores', 'alunos_professores.aluno_id', '=' , 'posts.user_id')
                ->leftjoin('comments', 'comments.post_id', '=' , 'posts.id')
              ->select('posts.id', 'posts.user_id', 'posts.title', 'alunos_professores.aluno_id',
               'alunos_professores.professor_id')
            ->get();

          //$posts = $this->post->with('coments');
          //$posts = $this->post->with('coments')->where('user_id', auth()->user()->id)->paginate();

          // dd($posts);
          return view('painel.tarefas.index', compact('posts'));


        //dd($posts);


      }else{

          echo "posts professores" ;

        }
    }
    public function show($id){
        $posts = $this->post->with(['coments.user','user'])->find($id);//where('id',$id)->first();
       // dd($posts);
        return view("{$this->view}.show", compact('posts'));

    }
}
