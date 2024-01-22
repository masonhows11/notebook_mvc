<?php


namespace App\Http\Controllers;


class PostController extends Controller
{


    public function index()
    {
        $data = [
            'tasks' => ['joe', 'mason', 'james', 'naeem', 'asma', 'sepideh', 'sara'],
            'title' => 'post index',
        ];
        view('post.index', $data);
        //  echo 'Index in method post controller' . PHP_EOL;

    }

    public function post()
    {
        global $request;
        $slug = $request->get_route_param('slug');
        echo "slug: $slug <br/>";
        // nice_dump($request);
        // view('post.post');
        //        echo 'Post in method Post controller' . PHP_EOL;
        //        die();
    }
    public function comment()
    {
        global $request;
        $slug = $request->get_route_param('slug');
        $cid = $request->get_route_param('cid');
        echo "slug: $slug <br/> comment : $cid";
        // nice_dump($request);
        // view('post.post');
        //        echo 'Post in method Post controller' . PHP_EOL;
        //        die();
    }




    public function create()
    {
        view('post.create');
        //        echo 'Create method post controller' . PHP_EOL;
        //        die();
    }

    public function store()
    {
        echo 'Store method post controller' . PHP_EOL;
        die();
    }

    public function edit()
    {
        view('post.edit');
        //        echo 'Edit method post controller' . PHP_EOL;
        //        die();
    }

    public function update($id)
    {
        echo 'update method post controller' . PHP_EOL;
        die();
    }

    public function delete($id)
    {
        echo 'Delete method post controller' . PHP_EOL;
        die();
    }

}