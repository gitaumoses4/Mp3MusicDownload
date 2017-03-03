<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Source;

class AdminController extends Controller {

    public function updateSources(Request $request) {
        $sources = Source::all();
        foreach ($sources as $source) {
            if ($request->has($source->name)) {
                DB::table('sources')
                        ->where('name', $source->name)
                        ->update(array('active' => 1));
            } else {
                DB::table('sources')
                        ->where('name', $source->name)
                        ->update(array('active' => 0));
            }
        }
        return json_encode(array("response" => "success"));
    }

}
