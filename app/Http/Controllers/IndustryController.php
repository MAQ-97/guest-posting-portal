<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Industry;
use Illuminate\Validation\Rules\In;

class IndustryController extends Controller
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
        $industry = Industry::all();

        return view('backend.industry.all',['industries' => $industry]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.industry.add');
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
            'industry' => 'required|min:3|max:50',
        ]);

        $industry = new Industry();
        $industry->industry = $request['industry'];
        $industry->save();

        return redirect()->route('industry.index')
            ->with('flash_message',
                'Industry "' . $industry->industry  . '" added!');

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
        return redirect('industry');
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
        $industry = Industry::find($id);
        return view('backend.industry.edit', compact('industry'));
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
        $industry = Industry::findOrFail($id);

        $this->validate($request, [
            'industry' => 'required|min:3|max:50',
        ]);
//        $input = $request->all();
//        dd($input);
        $industry->industry= $request['industry'];
        $industry->save();
//        dd($keyword);
        return redirect()->route('industry.index')
            ->with('flash_message',
                'Industry "' . $industry->industry . '" updated!');
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
        $industry = Industry::findOrFail($id);

        //Make it impossible to delete this specific permission

        $industry->delete();

        return redirect()->route('industry.index')
            ->with('flash_message',
                'Industry deleted!');

    }
}
