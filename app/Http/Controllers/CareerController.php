<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){
            if ( !auth()->user()->isAdmin() ){
                abort(403);
            }

            return $next($request);
        });    
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $careers = Career::query()->latest()->get();
        return view('careers.index', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $career = new Career();
        return view('careers.create', compact('career'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request,[
            'career_name' => 'required|unique:careers,career_name|max:191',
            'skills' => 'required|max:65530',
            'education' => 'required|max:65530',
            'interests' => 'required|max:65530',
        ]);


        Career::create($data);

        return to_route('careers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Career $career)
    {
        return view('careers.edit', compact('career'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Career $career)
    {
        $data = $this->validate($request,[
            'career_name' => 'required|max:191|unique:careers,career_name,'.$career->id,
            'skills' => 'required|max:65530',
            'education' => 'required|max:65530',
            'interests' => 'required|max:65530',
        ]);

        $career->update($data);

        return to_route('careers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Career $career)
    {
        $career->delete();

        return to_route('careers.index');
    }
}
