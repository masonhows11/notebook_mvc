<?php


namespace App\Http\Controllers;


use App\Models\Contact;


class HomeController extends Controller
{
    private $contactModel;

    public function __construct()
    {
        $this->contactModel = new Contact();
    }

    public function index()
    {
        $allContact = $this->contactModel->getAll();
        return view('home');
    }

}