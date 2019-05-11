<?php

namespace App\Http\Controllers\Posts;
use App\Http\Requests\StoreCommentFormRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Notifications\PostComentes;

class CommentController extends Controller {

  private $post;
  public function __construct(Post $post) {
      $this-> post= $post;
  }

    public function store(StoreCommentFormRequest $request, Post $post ) {

      if( auth()->user()->tipo == "aluno" ) {
        $tipo = 'alunos_professores.aluno_id';


                $comment = $request->user()->coments()->create($request->all());
                $posts = $this->post
                     ->where($tipo, '=' , auth()->user()->id)
                       ->leftjoin('alunos_professores', 'alunos_professores.aluno_id', '=' , 'posts.user_id')
                       ->leftjoin('comments', 'comments.post_id', '=' , 'posts.id')
                     ->select('posts.id', 'posts.user_id', 'posts.title', 'alunos_professores.aluno_id',
                      'alunos_professores.professor_id')
                   ->get();

                  // dd($tipo);


                $author = $comment->user->professor; //pegaria quem fez o comentario

                //dd($author);
                //$author = $comment->post->user;
                $author->notify(new PostComentes($comment));
                //dd($request->all());
                return redirect()
                                ->route('tarefas.show', $comment->post->id)
                                ->withSuccess('Comentario realizado com Sucesso');

      }

      if( auth()->user()->tipo == "professor" ) {
        $tipo = 'alunos_professores.professor_id';


        $comment = $request->user()->coments()->create($request->all());
        $posts = $this->post
             ->where($tipo, '=' , auth()->user()->id)
               ->leftjoin('alunos_professores', 'alunos_professores.aluno_id', '=' , 'posts.user_id')
               ->leftjoin('comments', 'comments.post_id', '=' , 'posts.id')
             ->select('posts.id', 'posts.user_id', 'posts.title', 'alunos_professores.aluno_id',
              'alunos_professores.professor_id')
           ->get();

          // dd($tipo);

        $author = $comment->post->user;
      //  dd($author);
        $author->notify(new PostComentes($comment));
        //dd($request->all());
        return redirect()
                        ->route('tarefas.show', $comment->post->id)
                        ->withSuccess('Comentario realizado com Sucesso');







      }





    }

}
