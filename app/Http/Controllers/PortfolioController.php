<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        if (session()->has('locale')) {
            app()->setLocale(session('locale'));
        }
        return view('portfolio');
    }
} 