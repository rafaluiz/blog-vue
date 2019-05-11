<?php
namespace App\Policies;

use App\User;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;
    
    public function before(User $user, $ability)
    {
        if( $user->id == 90 )
            return true;
    }
    
    public function owner(User $user, Post $post)
    {
        //echo 'Estou na class PostPolicy método owner';
        return $user->id == $post->user_id;
    }

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(User $user, Post $post)
    {
        echo 'Estou na class PostPolicy método view';
        return $user->id == $post->user_id;
    }
    
    public function novaVerificacao(User $user, Post $post)
    {
        echo 'Estou na class PostPolicy método novaVerificacao';
        return $user->id == $post->user_id;
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        return $user->id == $post->user_id;
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        //
    }
}
