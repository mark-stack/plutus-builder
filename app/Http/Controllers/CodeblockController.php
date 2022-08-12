<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Codeblock;

class CodeblockController extends Controller {

    public function index(){
       
        $codeblocks = Codeblock::all();

        return view('admin.codeblocks',compact('codeblocks'));
    }

    public function create(){
        //Create is on Index page
    }

    public function store(Request $request){

        $validated = $request->validate([
            'section' => 'required',
            'title' => 'required',
            'description' => 'required',
            'codeblock' => 'required'
        ]);

        $data = $validated;

        $new_codeblock = Codeblock::create($data);

        return back()->with('success','Saved new code block');
    }

    public function show($id){
        // Not applicable
    }

    public function edit($id){

        $codeblock = Codeblock::findorfail($id);

        return view('admin.codeblock_edit',compact('codeblock'));
    }

    public function update(Request $request, $id){

        $validated = $request->validate([
            'section' => 'required',
            'title' => 'required',
            'description' => 'required',
            'codeblock' => 'required'
        ]);

        $data = $validated;

        $codeblock = Codeblock::findorfail($id);
        $codeblock->update($data);
       
        return back()->with('success','Updated code block');
    }

    public function destroy($id){
        
        $codeblock = Codeblock::findorfail($id);

        $codeblock->delete();

        return back()->with('success','Deleted code block');
    }
}
