<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CoordsController extends Controller
{
    public function store(Request $request, News $news) {


        if ($news->coords()->first()) {
            $news->coords()->update([
                'address_longitude' => $request->get('address_longitude'),
                'address_latitude' => $request->get('address_latitude')]);
        } else {
            $news->coords()->create([
                'address_longitude' => $request->get('address_longitude'),
                'address_latitude' => $request->get('address_latitude')
            ]);
        }




        return response()->json([$request->all()]);
    }
}
