<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Maktab qonun-qoidalari sahifasi
     */
    public function schoolRules()
    {
        return view('schoolRules'); // resources/views/pages/schoolRules.blade.php
    }

    /**
     * FAQ sahifasi
     */
    public function faq()
    {
        return view('faq'); // resources/views/pages/faq.blade.php
    }

    /**
     * Davlat ramzlari sahifasi
     */
    public function stateSymbols()
    {
        return view('stateSymbols'); // resources/views/pages/stateSymbols.blade.php
    }

    /**
     * Har qanday boshqa statik sahifa qo'shish mumkin
     */
    public function contact()
    {
        return view('.contact'); // Agar kerak bo‘lsa
    }
}
