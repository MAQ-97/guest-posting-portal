<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\keyword;

class KeywordController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $keyword = keyword::all();

        return view('backend.keywords.all',['keywords' => $keyword]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.keywords.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'keyword' => 'required|min:3|max:15',
        ]);

        $keyword = new keyword();
        $keyword->keyword = $request['keyword'];
        $keyword->save();

        return redirect()->route('keywords.index')
            ->with('flash_message',
                'keyword "' . $keyword->keyword . '" added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return redirect('keywords');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $keyword = keyword::find($id);
        return view('backend.keywords.edit', compact('keyword'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $keyword = keyword::findOrFail($id);

        $this->validate($request, [
            'keyword' => 'required|min:3|max:15',
        ]);
//        $input = $request->all();
//        dd($input);
        $keyword->keyword = $request['keyword'];
        $keyword->save();
//        dd($keyword);
        return redirect()->route('keywords.index')
            ->with('flash_message',
                'Keyword "' . $keyword->keyword . '" updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $keyword = keyword::findOrFail($id);

        //Make it impossible to delete this specific permission

        $keyword->delete();

        return redirect()->route('keywords.index')
            ->with('flash_message',
                'blog deleted!');

    }
}
