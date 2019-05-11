<?php
namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use Mail;
use App\Mail\SendContact;

class SiteController extends Controller
{
    private $post;
    private $totalPage = 6;
    private $totalPageProduct = 9;
    private $totalPageSearch = 12;
    
    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    
    public function index()
    {
        $title = 'Flooring To Go';
        
        $postsFeatured = $this->post
                                    ->where('featured', true)
                                    ->limit(3)
                                    ->get();
        
        $posts = $this->post->orderBy('id', 'desc')->paginate($this->totalPage);
        
        return view('site.home.index', compact('title', 'postsFeatured', 'posts'));
    }
    
    public function company(Category $category)
    {
        $title = 'About Flooring To Go';

        return view('site.company.company', compact('title'));
    }


    public function videos(Category $category)
    {
        $title = 'About Flooring To Go';

        return view('site.videos.videos', compact('title'));
    }

    
    public function category(Category $category, $url)
    {
        $category = $category->where('url', $url)->get()->first();

        $title = "Category {$category->name} - Flooring To Go";
        
        $posts = $category->posts()->paginate($this->totalPageProduct);
        
        return view('site.category.category', compact('category', 'posts', 'title'));
    }
    
    
    public function post($url)
    {
        $post = $this->post->where('url', $url)->get()->first();
        
        $title = "{$post->title} - Flooring To Go";
        
        $postsRel = $this->post->where('id', '>', $post->id)->limit(4)->get();
        
        $author = $post->user;



        event(new \App\Events\PostViewed($post));
        
        return view('site.post.post', compact('post', 'title', 'postsRel', 'subtitle','author'));
    }
    
    
    public function commentPost(Request $request)
    {
        $comment = new Comment;
        
        $dataForm = $request->all();
        
        $validate = validator($dataForm, $comment->rules());
        if( $validate->fails() ) {
            return implode($validate->messages()->all("<p>:message</p>"));
        }
        
        if( $comment->newComment($dataForm) )
            return '1';
        else
            return 'Falha ao cadastrar comentário.';
    }





    public function contact(Category $category)
    {
        $title = 'Contact Flooring To Go';

        return view('site.contact.contact', compact('title'));
    }


    public function sendContact(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|min:3|max:100',
            'email'     => 'required|email|min:3|max:100',
            'subject'   => 'required|min:3|max:100',
            'message'   => 'required|min:3|max:1000',
        ]);

        $dataForm = $request->all();

        $mail = Mail::send(new SendContact($dataForm));

        return redirect('/contato')
                ->with(['success' => 'E-mail sent successfully, we will contact you soon!']);
    }

    public function search(Request $request)
    {
        $dataForm = $request->except('_token');
        
        $posts = $this
                    ->post
                    ->where('title', 'LIKE', "%{$dataForm['key-search']}%")
                    ->orWhere('description', 'LIKE', "%{$dataForm['key-search']}%")
                    ->orderBy('date', 'ASC')
                    ->paginate($this->totalPageSearch);

                    
        return view('site.search.search', compact('dataForm', 'posts'));
    }
}