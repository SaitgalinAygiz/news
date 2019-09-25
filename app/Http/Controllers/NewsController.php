<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {

        $articles = News::with('images')->get();


        return view('news.index', compact('articles'));

    }

    public function show(News $news) {

        $images = $news->images()->get();
        return view('news.article', array('news'=>$news, 'images'=>$images));

    }

    public function create()
    {
        return view('news.create');
    }

    public function edit(News $news) {



        $images = $news->images()->get();

        return view('news.update', array('news' => $news, 'images' => $images));

    }

    public function update(Request $request, News $news) {

        $this->validate(request(), [
            'title' => 'required|min:3',
            'description' => 'required',
            'image' => 'image'
        ]);


        $news->update(['title' => request('title'),
            'description' => request('description'),
            'user_id' => auth()->user()->id]);

        if ($request->has('image')) {

            if ($news->images()->first()) {
                $news->images()->update(['image' => request()->file('image')->store('images', 'public')]);
            } else {
                $news->images()->create(['image' => request()->file('image')->store('images', 'public')]);
            }
        }




        return redirect('/');

    }



    public function store(Request $request)
    {

        $this->validate(request(), [
            'title' => 'required|min:3',
            'description' => 'required',
            'image' => 'image'
        ]);

        $news = News::create([
            'title' => request('title'),
            'description' => request('description'),
            'user_id' => auth()->user()->id
        ]);

        if ($request->has('image')) {

            $news->images()->create(['image' => request()->file('image')->store('images', 'public')]);

        }


        return redirect('/');
    }

    public function delete(News $news) {


        $news->delete();

        return redirect('/');


    }




}
