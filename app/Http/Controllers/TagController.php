<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;

class TagController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $jobs = Tag::with(['jobs' => function ($query) {
            $query->with(['tags', 'employer']);
        }])->where('name', '=', $tag->name)->get();

        return view('results', ['jobs' => $jobs->first()->jobs]);
    }
}
