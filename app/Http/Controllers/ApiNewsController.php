<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiNewsController extends Controller
{
    public function show(News $news) {

        $address_latitude = $news->coords()->get();
        return $address_latitude;

    }
}
