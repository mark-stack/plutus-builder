<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Codeblock;
use App\Models\Script;
use App\Services\ScriptTemplateService;

class ScriptController extends Controller{

    public function index(){
        
        $user = Auth()->user();
  
        $scripts = $user->scripts()->get();
 
        $templates = Script::templates()->get();

        return view('user.scripts',compact('scripts','templates'));
    }

    public function create(){
        // Create is on Index page
    }

    public function store(Request $request){

        $validated = $request->validate([
            'title' => 'required|min:5|max:190|unique:scripts'
        ]);
   
        $user = Auth()->user();

        $data = array_merge($validated,['user_id' => $user->id]);

        $new_script = Script::create($data);
        
        //Get template codeblocks that will be added to the script
        $template_data_array = (new ScriptTemplateService)->templateDataArray($new_script);

        $new_script->update($template_data_array);

        $edit_url = 'scripts/'.$new_script->id.'/edit';

        return redirect($edit_url)->with('success','Started a new script');
    }

    public function show($id){

        $user = Auth()->user();

        $script = Script::YoursOrAdmin($user)->where('id',$id)->firstorfail();
        
        return view('user.preview',compact('script'));
    }

    public function edit($id){

        $user = Auth()->user();

        $script = $user->scripts()->where('id',$id)->firstorfail();

        $codeblocks = Codeblock::all();

        return view('user.make_script',compact('script','codeblocks'));
    }

    public function update(Request $request, $id){
        
        $validated = $request->validate([
            'description' => 'nullable',
            'testing' => 'nullable',
            'section1' => 'nullable',
            'section2' => 'nullable',
            'section3' => 'nullable',
            'section4A' => 'nullable',
            'section4B' => 'nullable',
            'section5' => 'nullable',
            'section6' => 'nullable',
            'section7' => 'nullable',
            'section8A' => 'nullable',
            'section8B' => 'nullable',
            'section9' => 'nullable',
            'section10' => 'nullable',
            'section11' => 'nullable'
        ]);

        $user = Auth()->user();

        $data = $validated;

        $script = Script::where('user_id',$user->id)->where('id',$id)->firstorfail();

        $script->update($data);

        return back()->with('success','Saved script');
    }

    public function destroy($id){

        $user = Auth()->user();

        $script = Script::where('user_id',$user->id)->where('id',$id)->firstorfail();
        $script->delete();

        return back()->with('success','Deleted script');
    }

    public function scriptRename(Request $request,$id){

        $validated = $request->validate([
            'title' => 'required'
        ]);

        $user = Auth()->user();

        $title = $validated['title'];

        $script = Script::where('user_id',$user->id)->where('id',$id)->firstorfail();
        $script->title = $title;
        $script->save();

        return back()->with('success','Script renamed');
    }

    public function scriptCopy($id){

        $user = Auth()->user();

        $script = Script::where('public',true)->where('id',$id)->firstorfail();

        $script_data = [
            'title' => $script->title." (copy)",
            'testing' => $script->testing,
            'description' => $script->description,
            'user_id' => $user->id,
            'section1' => $script->section1,
            'section2' => $script->section2,
            'section3' => $script->section3,
            'section4A' => $script->section4A,
            'section4B' => $script->section4B,
            'section5' => $script->section5,
            'section6' => $script->section6,
            'section7' => $script->section7,
            'section8A' => $script->section8A,
            'section8B' => $script->section8B,
            'section9' => $script->section9,
            'section10' => $script->section10,
            'section11' => $script->section11
        ];

        $copy_script = Script::create($script_data);

        return back()->with('success','Script copied');

    }
}
