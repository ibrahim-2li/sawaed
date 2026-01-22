<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $services = \App\Models\Service::all();
        $projects = \App\Models\Project::all();
        $clients = \App\Models\Client::orderBy('order')->get();
        $brands = \App\Models\Brand::orderBy('order')->get();
        $settings = \App\Models\Setting::all()->pluck('value', 'key');

        return view('welcome', compact('services', 'projects', 'clients', 'brands', 'settings'));
    }
}
