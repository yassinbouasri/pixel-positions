<?php

namespace App\Http\Controllers;

use App\Models\Job;

class SearchController extends Controller
{
    public function __invoke()
    {
        $job = Job::with(['employer', 'tags'])->where('title', 'like', '%'.request('q').'%')->get();

        return view('results', ['jobs' => $job]);
    }
}
