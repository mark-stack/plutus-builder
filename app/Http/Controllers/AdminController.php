<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Codeblock;

class AdminController extends Controller {

    public function assignTemplates(Request $request){
        
        $validated = $request->validate([
            'section_1' => 'nullable',
            'section_2' => 'nullable',
            'section_3' => 'nullable',
            'section_4A' => 'nullable',
            'section_4B' => 'nullable',
            'section_5' => 'nullable',
            'section_6' => 'nullable',
            'section_7' => 'nullable',
            'section_8A' => 'nullable',
            'section_8B' => 'nullable',
            'section_9' => 'nullable',
            'section_10' => 'nullable',
            'section_11' => 'nullable'
        ]);
      
        //Clear all codeblock template status
        Codeblock::query()->update([
            'template' => false
        ]);

        //Update with revised template status
        foreach($validated as $codeblock_id){
            $codeblock = Codeblock::findorfail($codeblock_id);
            $codeblock->template = true;
            $codeblock->save();
        }

        return back()->with('success','Updated template list');
    }

}
