<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{

    public function index()
    {
        $daysUntil = Carbon::now()->diffInDays(Carbon::createFromDate(2016, 4, 2, 'America/Phoenix'));

        return view('pages.index_complete', compact('daysUntil'));
    }

    public function info()
    {
        return view('pages.info');
    }

    public function photos()
    {
        return view('pages.photos');
    }

    public function registry()
    {
        return view('pages.registry');
    }

    public function story()
    {
        return view('pages.story');
    }

    public function tucson()
    {
        return view('pages.tucson');
    }

    public function rehearsal()
    {
        return view('pages.rehearsal');
    }
}
