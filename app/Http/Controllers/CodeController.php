<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\Surveillance;
use App\Http\Requests\StoreCodeRequest;
use App\Http\Requests\UpdateCodeRequest;

class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view("codes.index")->with([
            "codes"=>Code::all(),
            "surveillances"=>Surveillance::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCodeRequest $request)
    {
        //
        Code::create($request->validated());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Code $code)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Code $code)
    {
        //
       return  view("codes.edit")->with([
            "code"=>$code,
            "surveillances"=>Surveillance::all(),
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCodeRequest $request, Code $code)
    {
        //
        $code->update($request->validated());
        return redirect()->route("code.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Code $code)
    {
        //
        $code->delete();
        return redirect()->back();
    }
}
