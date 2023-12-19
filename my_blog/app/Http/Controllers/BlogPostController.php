<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // select * from blog_posts; 
        $blogs = BlogPost::all();
        // return $blog;
        // return view('blog.index', ['blogs'=> $blogs]);
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // create insert into la table
        // last inserted id ?
        // select * from.. where id=lastinserted
        $newBlog = BlogPost::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::user()->id,
        ]);
        // redirect : refait la route
        return redirect(route('blog.show', $newBlog->id))->withSuccess('Article enregistré !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost)
    {

        //New BlogPost
        //$blogPost = select * from blog_posts where id = $blogPost

        return view('blog.show', compact('blogPost'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blogPost)
    {
        // view maintient le url mais change le contenu tandis que le redirect change le url
        return view('blog.edit', compact('blogPost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost  (l'objet)
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        //$blogpost: l'ancien objet
        //$request: l'objet modifier
        $blogPost->update([
            'title'=> $request->title,
            'body'=> $request->body,
        ]);
        return redirect(route('blog.show', $blogPost->id))->withSuccess('Article modifié !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
        // On utilise la methode delete() sur l'objet
        $blogPost->delete();

        return redirect(route('blog.index'))->withSuccess('Article supprimé !');
    }

    public function query(){
        //$blog = BlogPost::all();
        //$blog = BlogPost::Select('title', 'body')->get();
        //$blog = BlogPost::Select()->orderby('id', 'desc')->first();
        //$blog = BlogPost::where("id", 3)->get();  //tableau multidimensionnel
        //$blog = BlogPost::find(1); //select * from table where id = 
        //$blog = BlogPost::select('title', 'body')->where('title', 'like', 'Art%')->orderby('title')->get();
        //$blog = BlogPost::select()->where('user_id', 1)->where('title', 'like', '%te%')->get(); // AND (2 where)
        //$blog = BlogPost::select()->where('user_id', 1)->orWhere('id', 4)->get();
        // select * from blog_post INNER JOIN user on user_id = users.id;
        //$blog = BlogPost::select()->join('users', 'Blog_posts.user_id', 'users.id')->get();
        // select * from blog_post RIGHT OUTER JOIN user on user_id = users.id;
        // $blog = BlogPost::select()
        //                 ->rightJoin('users', 'Blog_posts.user_id', 'users.id')
        //                 ->get();

        //$blog = BlogPost::select()->where('title', 'article')->get()->count();
        //$blog = BlogPost::count();
        //$blog = BlogPost::max('id');

        //SELECT count(*) as blogs, user_id FROM my_blog.blog_posts group by user_id;
        //$blog = BlogPost::select(DB::raw('count(*) as blogs, user_id'))->groupBy('user_id')->get();
        //$blog = BlogPost::find(1);
        //return $blog->blogHasUser->name;

    }

    public function pagination(){

        $blogs = BlogPost::select()->paginate(3);

        //return $blogs;
        return view('blog.pagination', compact('blogs'));
    }
}
