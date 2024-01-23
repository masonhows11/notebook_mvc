<?php


namespace App\Http\Controllers;


use App\Core\Request;
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

        global $request;
        $where = ['ORDER' => ["created_at" => "DESC"]];
        if (!is_null($request->inputKey('search'))) {
           //  $where["name[~]"] = $request->inputKey('search');
            $where['AND'] = [
                'OR' => [
                    "name[~]" => $request->inputKey('search'),
                    "user_name[~]" => $request->inputKey('search'),
                    "email[~]" => $request->inputKey('search'),
                    "mobile[~]" => $request->inputKey('search'),

                ]
            ];
        }
        $allContact = $this->contactModel->get('*', $where);
        $data = [
            'contacts' => $allContact
        ];
        return view('home', $data);
    }

    public function store(Request $request)
    {
        nice_dump($request);
    }

}