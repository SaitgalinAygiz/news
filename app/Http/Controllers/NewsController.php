<?php

namespace App\Http\Controllers;

use App\Image;
use App\News;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index() {


        $articles = News::with('image')->get();


        return view('news', compact('articles'));



    }


}
