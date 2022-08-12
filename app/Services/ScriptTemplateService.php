<?php

namespace App\Services;
use App\Models\Codeblock;

class ScriptTemplateService {

    public function templateDataArray($new_script){

        $all_template_codeblocks = Codeblock::where('template',true)->get();

        $template_data_array = [];
        foreach($all_template_codeblocks as $codeblock){
            $template_data_array['section'.$codeblock->section] = $codeblock->codeblock;
        }

        return $template_data_array;
    }
}