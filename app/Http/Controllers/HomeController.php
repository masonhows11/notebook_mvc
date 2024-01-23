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
        $search_keyword =  $request->inputKey('search');
        if (!is_null($request->inputKey('search'))) {
          //  var_dump($request->inputKey('search'));
              $where["name[~]"] = $request->inputKey('search');
            //            $where['AND'] = [
            //                'OR' => [
            //                    "name[~]" => $request->inputKey('search'),
            //                    "user_name[~]" => $request->inputKey('search'),
            //                    "email[~]" => $request->inputKey('search'),
            //                    "mobile[~]" => $request->inputKey('search'),
            //
            //                ]
            //            ];

            //            $where['OR'] = [
            //                "name[~]" => $search_keyword,
            //                "user_name[~]" => $search_keyword,
            //                "email[~]" => $search_keyword,
            //                "mobile[~]" => $search_keyword,
            //            ];
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