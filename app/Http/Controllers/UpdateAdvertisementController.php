<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateAdvertisementController extends Controller {

    public function index(Request $request) {
        if ($request->has("id")) {
            $id = $request->get("id");

            $advert = \App\Advertisement::findOrFail($id);
            $code = $request->has("code") ? htmlentities($request->get("code")) : $advert->code;
            if ($request->has("visibility")) {
                $visible = 1;
            } else {
                $visible = 0;
            }
            $advert->code = $code;
            $advert->visible = $visible;
            $advert->save();
            echo json_encode(array("status" => "success", "responseText" => "Advertisement updated successfully", "code" => $advert->code));
        } else {
            echo json_encode(array("status" => "error", "responseText" => "Advert id not specified"));
        }
    }

}
