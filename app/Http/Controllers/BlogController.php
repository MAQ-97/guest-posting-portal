<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog;
use App\blog_meta;
use App\keyword;
use App\blog_keyword;
use App\Industry;
use App\blog_industry;
class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogs = blog::with('blog_meta')->get();
//        dd($blogs);
        foreach ($blogs as $blog) {
            foreach ($blog->blog_meta as $blog_meta) {
                $blog[$blog_meta->meta_key] = $blog_meta->meta_value;
            }
        }

        return view('backend.blogs.all', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $keywords = keyword::select('id','keyword')->get();
        $industries = Industry::select('id','industry')->get();
        $all_industries = [];
        $all_keywords = [];
        foreach($keywords as $keyword)
        {
            $all_keywords[$keyword->id] = $keyword->keyword;
        }
        foreach($industries as $industry)
        {
            $all_industries[$industry->id] = $industry->industry;
        }
        return view('backend.blogs.add',['keywords' => $all_keywords,'industries' => $all_industries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'link' => 'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'title' => 'required|min:3|max:50',
            'description' => 'required',
            'da' => 'required',
            'fb_likes' => 'required',
            'follower' => 'required',
            'dropped' => 'required',
            'price' => 'required'
        ]);

        $blog = new blog();
        $blog->link = $request['link'];
        $blog->title = $request['title'];
        $blog->description = $request['description'];
        $blog->price = $request['price'];
//        $blog->save();
        if ($blog->save()) {
            $blog_metas = blog_meta::insert(array(
                array('blog_id' => $blog->id, 'meta_key' => 'da', 'meta_value' => $request['da']),
                array('blog_id' => $blog->id, 'meta_key' => 'fb_likes', 'meta_value' => $request['fb_likes']),
                array('blog_id' => $blog->id, 'meta_key' => 'follower', 'meta_value' => $request['follower']),
                array('blog_id' => $blog->id, 'meta_key' => 'dropped', 'meta_value' => $request['dropped']),
            ));
            foreach ($request['keyword'] as $keyword)
            {
                $blog_keyword = new blog_keyword();
                $blog_keyword->blog_id = $blog->id;
                $blog_keyword->keyword_id = $keyword;
                $blog_keyword->save();
            }
            foreach ($request['industry'] as $industry)
            {
                $blog_industry = new blog_industry();
                $blog_industry->blog_id = $blog->id;
                $blog_industry->industry_id = $industry;
                $blog_industry->save();
            }
        }
        return redirect()->route('blogs.index')
            ->with('flash_message',
                'Blog ' . $blog->title . ' added!');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return redirect('blogs');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $blog = blog::find($id);
        $keywords = keyword::all();
        $industries = Industry::all();
        $all_industries = [];
        $all_keywords = [];
        foreach($keywords as $keyword)
        {
            $all_keywords[$keyword->id] = $keyword->keyword;
        }
        foreach($industries as $industry)
        {
            $all_industries[$industry->id] = $industry->industry;
        }
        $blog_metas = blog_meta::where('blog_id', $blog->id)->get();
        $blog_keywords = blog_keyword::where('blog_id', $blog->id)->get();
        $blog_industries = blog_industry::where('blog_id', $blog->id)->get();
        foreach ($blog_metas as $blog_meta) {
            $blog[$blog_meta->meta_key] = $blog_meta->meta_value;
        }
        $keyword = [];
        foreach ($blog_keywords as $blog_keyword)
        {
            $keyword[] = $blog_keyword->keyword_id;
        }
        $blog['keyword'] = $keyword;
        $industry = [];
        foreach ($blog_industries as $blog_industry)
        {
            $industry[] = $blog_industry->industry_id;
        }
        $blog['industry'] = $industry;
//        dd($blog);
        return view('backend.blogs.edit', ['blog' => $blog,'keywords' => $all_keywords,'industries' => $all_industries]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
//        dd($request);
        $blogs = blog::findOrFail($id);
        $this->validate($request, [
            'link' => 'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'title' => 'required|min:3|max:50',
            'description' => 'required',
            'da' => 'required',
            'fb_likes' => 'required',
            'follower' => 'required',
            'dropped' => 'required',
        ]);
//        dd($request);
        $blogs->link = $request['link'];
        $blogs->title = $request['title'];
        $blogs->description = $request['description'];
        $blogs->price = $request['price'];
        if ($blogs->save()) {
            blog_meta::where('blog_id', $blogs->id)->where('meta_key', 'da')
                ->update([
                    'meta_key' => 'da',
                    'meta_value' => $request['da'],
                ]);
            blog_meta::where('blog_id', $blogs->id)->where('meta_key', 'fb_likes')
                ->update([
                    'meta_key' => 'fb_likes',
                    'meta_value' => $request['fb_likes'],
                ]);
            blog_meta::where('blog_id', $blogs->id)->where('meta_key', 'follower')
                ->update([
                    'meta_key' => 'follower',
                    'meta_value' => $request['follower'],
                ]);
            blog_meta::where('blog_id', $blogs->id)->where('meta_key', 'dropped')
                ->update([
                    'meta_key' => 'dropped',
                    'meta_value' => $request['dropped'],
                ]);
            blog_keyword::where('blog_id',$blogs->id)->delete();
            foreach ($request['keyword'] as $keyword)
            {
                $blog_keyword = new blog_keyword();
                $blog_keyword->blog_id = $blogs->id;
                $blog_keyword->keyword_id = $keyword;
                $blog_keyword->save();
            }
            blog_industry::where('blog_id',$blogs->id)->delete();
            foreach ($request['industry'] as $industry)
            {
                $blog_industry = new blog_industry();
                $blog_industry->blog_id = $blogs->id;
                $blog_industry->industry_id = $industry;
                $blog_industry->save();
            }

        }

        return redirect()->route('blogs.index')
            ->with('flash_message',
                'Blog ' . $blogs->title . ' updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $blogs = blog::findOrFail($id);

        //Make it impossible to delete this specific permission

        $blogs->delete();

        return redirect()->route('blogs.index')
            ->with('flash_message',
                'blog deleted!');
    }
}
