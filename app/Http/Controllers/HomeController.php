<?php


namespace App\Http\Controllers;


use App\Core\Request;
use App\Models\Contact;
use App\Utilities\Validation;


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
        $search_keyword = $request->inputKey('search');
        if (!is_null($request->inputKey('search'))) {
            // var_dump($request->inputKey('search'));
            // $where["name[~]"] = $request->inputKey('search');

            // in this condition we store condition query in $where array variable
            //            $where['AND'] = [
            //                'OR' => [
            //                    "name[~]" => $search_keyword,
            //                    "user_name[~]" => $search_keyword,
            //                    "email[~]" => $search_keyword,
            //                    "mobile[~]" => $search_keyword,
            //                ]
            //            ];

            $where['OR'] = [
                "name[~]" => $search_keyword,
                "first_name[~]" => $search_keyword,
                "email[~]" => $search_keyword,
                "mobile[~]" => $search_keyword,
            ];
            // $allContact = $this->contactModel->get('*', $where);
            //var_dump($allContact);
        }
        $allContact = $this->contactModel->get('*', $where);
        $data = [
            'contacts' => $allContact
        ];
        return view('home', $data);
    }

    public function store()
    {
        global $request;
        $count = $this->contactModel->count(['mobile' => $request->inputKey('mobile')]);
        if ($count) {
            $where = ['ORDER' => ["created_at" => "DESC"]];
            $allContact = $this->contactModel->get('*', $where);
            $data = [
                'alreadyExists' => true,
                'message' => 'کاربری با مشخصات وارد شده  وجود دارد',
                'alert' => 'danger',
                'contacts' => $allContact
            ];
            view('home', $data);
            die();
        }
        if (Validation::is_valid_email($request->inputKey('email'))) {

            $where = ['ORDER' => ["created_at" => "DESC"]];
            $allContact = $this->contactModel->get('*', $where);

            $data  ['alreadyExists'] = false;
            $data  ['contacts'] = $allContact;
            $data  ['message'] = "ایمیل وارد شده معتبر نمی باشد";
            $data  ['alert'] = 'danger';
            view('home', $data);

        }

        $user = $this->contactModel->create([
            'name' => $request->inputKey('name'),
            'first_name' => $request->inputKey('first_name'),
            'email' => $request->inputKey('email'),
            'mobile' => $request->inputKey('mobile'),
            'password' => $request->inputKey('password')
        ]);

        $where = ['ORDER' => ["created_at" => "DESC"]];
        $allContact = $this->contactModel->get('*', $where);

        $data  ['alreadyExists'] = false;
        $data  ['user_id'] = $user;
        $data  ['message'] = " کاربر جدید با شناسه  $user ایجاد شد ";
        $data  ['alert'] = 'success';
        $data  ['contacts'] = $allContact;
        view('home', $data);

    }

}