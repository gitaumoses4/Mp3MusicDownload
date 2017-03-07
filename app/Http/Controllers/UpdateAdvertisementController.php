<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateAdvertisementController extends Controller {

    public function index(Request $request) {
        if ($request->has("id")) {
            $id = $request->get("id");
            if ($request->has("code")) {
                $visible = $request->get("visibility");
                $code = htmlspecialchars($request->get("code"));

                $advert = \App\Advertisement::findOrFail($id);
                $advert->code = $code;
                $advert->visible = $visible;
                $advert->save();
                echo json_encode(array("status" => "success", "responseText" => "Advertisement updated successfully"));
            } else {
                echo json_encode(array("status" => "warning", "responseText" => "Advertisement code not specified"));
            }
        } else {
            echo json_encode(array("status" => "error", "responseText" => "Advert id not specified"));
        }
    }

}
