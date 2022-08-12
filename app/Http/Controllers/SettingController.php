<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller{

    public function update(Request $request){

        $requestData = $request->all();
        $setting = Setting::findOrFail(1);
        $setting->update($requestData);

        return redirect()->back();
    }

}
