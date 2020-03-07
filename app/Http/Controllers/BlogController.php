<?php

namespace App\Http\Controllers;

use Auth;
use App\Blog;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::take(3)->latest()->get();
        return view('welcome', compact('blogs'));
    }

    public function showAll()
    {
        $blogs = Blog::latest()->paginate(9);
        
        return view('blogs.show', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Blog $blog)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'excerpt' =>'required|min:3',
            'content' => 'required|min:3',
            'image' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:4000'
        ]);
    
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        
        if($request->hasFile('image')){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            $request->file('image')->storeAs('public/uploads',$imageName);
        }else{
            $imageName = 'defaultImg.jpg';
        }
        
        $blog->user_id = Auth::user()->id;
        $blog->title = request('title');
        $blog->excerpt = request('excerpt');
        $blog->content = request('content');
        $blog->image = $imageName ;
        $blog->save();

        return redirect('/blogs')->with('success', 'Blog Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        $recent = Blog::take(3)->latest()->get();

        $comments = Comment::where('blog_id', $blog->id)->latest()->get();

        return view('blogs.blogDetail', compact('blog', 'recent', 'comments'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {   
        // authorize the user 
        $this->authorize('update', $blog);

        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        // validate the blog 
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'excerpt' =>'required|min:3',
            'content' => 'required|min:3',
            'image' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:4000'
        ]);
    
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        // uploads the image 
        if($request->hasFile('image')){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            $request->file('image')->storeAs('public/uploads',$imageName);
        }
        // save the updates 
        $updated= Blog::find($blog->id);
        $updated->user_id = Auth::user()->id;
        $updated->title = request('title');
        $updated->excerpt = request('excerpt');
        $updated->content = request('content');
        if($request->hasFile('image')){
            $updated->image = $imageName;
        }
        $updated->save();

        \File::delete('uploads/'.$blog->image);
        return redirect(route('blog.single', $blog))->with('success', 'Blog Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        // authorize the user 
        $this->authorize('delete', $blog);

        Blog::find($blog->id)->delete();
        \File::delete('uploads/'.$blog->image);
        return redirect('/blogs')->with('success', 'Blog Successfully Deleted');
    }
}
