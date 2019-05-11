<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Profile;
use App\Models\Permission;

class PainelController extends Controller
{
    public function index()
    {
        $totalUser          = User::count();
        $totalCategories    = Category::count();
        $totalPosts         = Post::count();
        $totalComments      = Comment::where('status', 'R')->count();
        $totalProfiles      = Profile::count();
        $totalPermissions   = Permission::count();
        
        return view('painel.home.index', compact('totalUser', 'totalCategories', 'totalPosts', 'totalComments', 'totalProfiles', 'totalPermissions'));
    }
}