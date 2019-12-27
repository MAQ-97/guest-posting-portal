<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog;
use App\blog_meta;
use App\keyword;
use App\blog_keyword;
use App\Industry;
use App\blog_industry;
use App\orders;
use App\order_blog;
use App\order_log;
use Response;
use Auth;
use DB;
use Illuminate\Support\Facades\Input;

class BlogController extends Controller
{
    public function __construct()
    {
        //  $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
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
        $blog_meta_details = [];
        //        dd($blogs);

        foreach ($blogs as $blog) {
            foreach ($blog->blog_meta as $key => $blog_meta) {
                $blog_meta_details[$blog_meta->meta_key] = $blog_meta->meta_value;
            }
        }

        return view('backend.blogs.all', ['blogs' => $blogs, 'blog_meta_details' => $blog_meta_details]);
    }



    public function create()
    {
        //
        $keywords = keyword::select('id', 'keyword')->get();
        $industries = Industry::select('id', 'industry')->get();
        $all_industries = [];
        $all_keywords = [];
        foreach ($keywords as $keyword) {
            $all_keywords[$keyword->id] = $keyword->keyword;
        }
        foreach ($industries as $industry) {
            $all_industries[$industry->id] = $industry->industry;
        }
        return view('backend.blogs.add', ['keywords' => $all_keywords, 'industries' => $all_industries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new blog();

        $this->validate($request, [
            'link'          => 'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'title'         => 'required|min:3|max:50',
            'description'   => 'required',
            'da'            => 'required',
            'fb_likes'      => 'required',
            'follower'      => 'required',
            'dropped'       => 'required',
            'price'         => 'required',
            'image'         => 'required|image'
        ]);

        $file = $request->file('image');
        $extension = $request->image->extension();

        $blog->link = $request['link'];
        $blog->title = $request['title'];
        $blog->description = $request['description'];
        $blog->price = $request['price'];
        $blog->blog_image = $request->image->store('upload', 'public');

        //$blog->save();
        if ($blog->save()) {
            $blog_metas = blog_meta::insert(array(
                array('blog_id' => $blog->id, 'meta_key' => 'da', 'meta_value'       => $request['da']),
                array('blog_id' => $blog->id, 'meta_key' => 'fb_likes', 'meta_value' => $request['fb_likes']),
                array('blog_id' => $blog->id, 'meta_key' => 'follower', 'meta_value' => $request['follower']),
                array('blog_id' => $blog->id, 'meta_key' => 'dropped', 'meta_value'  => $request['dropped']),
            ));
            foreach ($request['keyword'] as $keyword) {
                $blog_keyword = new blog_keyword();
                $blog_keyword->blog_id = $blog->id;
                $blog_keyword->keyword_id = $keyword;
                $blog_keyword->save();
            }
            foreach ($request['industry'] as $industry) {
                $blog_industry = new blog_industry();
                $blog_industry->blog_id = $blog->id;
                $blog_industry->industry_id = $industry;
                $blog_industry->save();
            }
        }

        return redirect()->route('blogs.index')
            ->with(
                'flash_message',
                'Blog ' . $blog->title . ' added!'
            );
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    //     $blog = blog::find($id);
    //     // dd($blog);
    //     $keywords = keyword::all();
    //     $industries = Industry::all();
    //     $all_industries = [];
    //     $all_keywords = [];
    //     foreach ($keywords as $keyword) {
    //         $all_keywords[$keyword->id] = $keyword->keyword;
    //     }
    //     foreach ($industries as $industry) {
    //         $all_industries[$industry->id] = $industry->industry;
    //     }
    //     $blog_metas = blog_meta::where('blog_id', $blog->id)->get();
    //     $blog_keywords = blog_keyword::where('blog_id', $blog->id)->get();
    //     $blog_industries = blog_industry::where('blog_id', $blog->id)->get();
    //     foreach ($blog_metas as $blog_meta) {
    //         $blog[$blog_meta->meta_key] = $blog_meta->meta_value;
    //     }
    //     $keyword = [];
    //     foreach ($blog_keywords as $blog_keyword) {
    //         $keyword[] = $blog_keyword->keyword_id;
    //     }
    //     $blog['keyword'] = $keyword;
    //     $industry = [];
    //     foreach ($blog_industries as $blog_industry) {
    //         $industry[] = $blog_industry->industry_id;
    //     }
    //     $blog['industry'] = $industry;
    //     //        dd($blog);
    //     return view('backend.blogs.show', ['blog' => $blog, 'keywords' => $all_keywords, 'industries' => $all_industries]);
    // }
    public function show()
    {
        $blogs = blog::with('blog_meta')->get();
        $blog_meta_details = [];

        foreach ($blogs as $blog) {
            foreach ($blog->blog_meta as $key => $blog_meta) {
                $blog_meta_details[$blog_meta->meta_key] = $blog_meta->meta_value;
            }
        }

        return view('backend.blogs.blogs', ['blogs' => $blogs, 'blog_meta_details' => $blog_meta_details]);
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
        foreach ($keywords as $keyword) {
            $all_keywords[$keyword->id] = $keyword->keyword;
        }
        foreach ($industries as $industry) {
            $all_industries[$industry->id] = $industry->industry;
        }
        $blog_metas = blog_meta::where('blog_id', $blog->id)->get();
        $blog_keywords = blog_keyword::where('blog_id', $blog->id)->get();
        $blog_industries = blog_industry::where('blog_id', $blog->id)->get();
        foreach ($blog_metas as $blog_meta) {
            $blog[$blog_meta->meta_key] = $blog_meta->meta_value;
        }
        $keyword = [];
        foreach ($blog_keywords as $blog_keyword) {
            $keyword[] = $blog_keyword->keyword_id;
        }
        $blog['keyword'] = $keyword;
        $industry = [];
        foreach ($blog_industries as $blog_industry) {
            $industry[] = $blog_industry->industry_id;
        }
        $blog['industry'] = $industry;
        //        dd($blog);
        return view('backend.blogs.edit', ['blog' => $blog, 'keywords' => $all_keywords, 'industries' => $all_industries]);
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
            blog_keyword::where('blog_id', $blogs->id)->delete();
            foreach ($request['keyword'] as $keyword) {
                $blog_keyword = new blog_keyword();
                $blog_keyword->blog_id = $blogs->id;
                $blog_keyword->keyword_id = $keyword;
                $blog_keyword->save();
            }
            blog_industry::where('blog_id', $blogs->id)->delete();
            foreach ($request['industry'] as $industry) {
                $blog_industry = new blog_industry();
                $blog_industry->blog_id = $blogs->id;
                $blog_industry->industry_id = $industry;
                $blog_industry->save();
            }
        }

        return redirect()->route('blogs.bloglist')
            ->with(
                'flash_message',
                'Blog ' . $blogs->title . ' updated!'
            );
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

        return redirect()->route('blogs.bloglist')
            ->with(
                'flash_message',
                'blog deleted!'
            );
    }

    public function blog_search()
    {
        $keyword  = Input::get('keyword');

        $get_keyword   = keyword::where('keyword', 'LIKE', '%' . $keyword . '%')->first();
        if ($get_keyword) {
            $result   = blog_keyword::where('keyword_id', $get_keyword->id)->with('blog')->get();
        }

        if ($keyword == "" || (!$get_keyword)) {
            $result =  keyword::where('keyword', '=', 'null');
        }

        return view('backend.blogs.all', ['result' => $result]);
    }

    public function add_to_cart(Request $request)
    {
        $log_details = order_log::all();
        $new_data = $request->all();
        $current_user_id = $new_data['user_id'];

        if (count($log_details) == 0) {
            //echo "no record found";
            $log = new order_log();
            $arr_ = array($new_data);
            $log->user_id = $current_user_id;
            $log->meta_key = 'add-to-cart-details';
            $log->meta_value = serialize($arr_);
            $log->save();
        } else {

            $userIDs = [];
            $main_arr = [];
            $ids = DB::table('order_log')->pluck('user_id');

            foreach ($ids as $user_id) {
                $userIDs[] = $user_id;
            }


            if (in_array(Auth::user()->id, $userIDs)) {

                foreach ($log_details as $log_detail) {

                    $user_id_ = (!empty($log_detail->user_id) ? $log_detail->user_id : "0");

                    if ($user_id_ == $current_user_id) {

                        $previous_logs = unserialize($log_detail->meta_value);
                        $prev_arrays = count($previous_logs);

                        var_dump($previous_logs);

                        $new_logs = $new_data;
                        $main_arr['0'] = $new_logs;

                        for ($i = 0; $i < $prev_arrays; $i++) {
                            foreach ($previous_logs as $key => $arr) {
                                $main_arr[$i + 1] = $arr;
                            }
                        }
                    }
                }

                order_log::where(['user_id' => Auth::user()->id])->update([
                    "meta_key" => 'add-to-cart-details',
                    "meta_value" => serialize($main_arr)
                ]);
            } else {
                $log = new order_log();
                $array_ = array($new_data);
                $log->user_id = $current_user_id;
                $log->meta_key = 'add-to-cart-details';
                $log->meta_value = serialize($array_);
                $log->save();
            }
        }
    }

    public function add_to_cart_update()
    {
        $current_user_id = Auth::user()->id;
        $log_details = order_log::where('user_id', $current_user_id)->get();
        // dd($log_details);

        foreach ($log_details as $log) {
            //    $user_id = $log->user_id;
            $cart_no = count(unserialize($log->meta_value));
        }
        //echo $cart_no;
        // $cart_no = !($cart_no) ? $cart_no : "0";

        return Response::json(array('success' => true, 'result' => $cart_no));
    }

    public function cart(Request $request)
    {
        $current_user_id = Auth::user()->id;
        $log_details = order_log::where('user_id', $current_user_id)->get();
        $log_details = unserialize($log_details[0]->meta_value);
        $arr = [];
        foreach ($log_details as $data) {
            $arr[] = sort($data);
        }


       return view('backend.cart', ['cart_data' => $log_details]);


    }

    public function checkout(Request $request)
    {

        $current_user_id = Auth::user()->id;
        $log_details = order_log::where('user_id', $current_user_id)->get();
        $log_details = unserialize($log_details[0]->meta_value);
        $arr = [];
        foreach ($log_details as $data) {
            $arr[] = sort($data);
        }

        return view('backend.checkout', ['cart_data' => $log_details]);
    }

    public function cart_update(Request $request)
    {
        $current_user_id = Auth::user()->id;
        $log_details = order_log::where('user_id', $current_user_id)->get();
        $log_details = unserialize($log_details[0]->meta_value);
        //dd($log_details[$request->array_index]);
        // dd('update');
        //dd($request->all());

        return redirect()->route('blog.cart');
    }

    public function cart_delete(Request $request)
    {
        $current_user_id = Auth::user()->id;
        $log_details = order_log::where('user_id', $current_user_id)->get();
        $log_details = unserialize($log_details[0]->meta_value);
        unset($log_details[$request->array_index]);
        $log_details = serialize($log_details);
        order_log::where(['user_id' => Auth::user()->id])->update([
            "meta_key" => 'add-to-cart-details',
            "meta_value" => $log_details
        ]);
        return redirect()->route('blog.cart');
    }

    // public function blog_list(){
    //     dd('ahsa');
    //     $blogs = blog::with('blog_meta')->get();
    //     $blog_meta_details = [];
    //             dd($blogs);

    //     foreach ($blogs as $blog) {
    //         foreach ($blog->blog_meta as $key => $blog_meta) {
    //             $blog_meta_details[$blog_meta->meta_key] = $blog_meta->meta_value;
    //         }
    //     }

    //     return view('backend.blogs.blogs', ['blogs' => $blogs , 'blog_meta_details' => $blog_meta_details]);
    //    }
}
