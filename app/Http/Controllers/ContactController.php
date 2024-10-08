<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //methode pour afficher le formulaire de contact
    public function index()
    {
        return view('contact');
    }
}
