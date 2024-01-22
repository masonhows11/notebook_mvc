<?php

include "../bootstrap/bootstrap.php";

////////// test for user model

$router = new \App\Core\Routing\Router();
$router->run();


//// done
//$new_user = [
//    "name" => "sara_bahrami",
//    "first_name" => "sara",
//    "last_name" => "bahrami",
//    "email" => "sara1_992@gmail.com",
//    "password" => "123456",
//];

//// done
// $user = new \App\Models\User();
// $result = $user->create($new_user);
// var_dump($result);

//// done
// $user = new \App\Models\User();
// for ($i = 1 ; $i <= 20 ; $i++){
//    $user->create([
//        "name" => "user-$i",
//        "first_name" => "user_first-$i",
//        "last_name" => "user_last-$i",
//        "email" => "userEmail$i@gmail.com",
//        "password" => "123456-$i",
//    ]);
//}
// var_dump($user->find(386));
// var_dump($user->getAll());

//// done
// $user = new \App\Models\User();
// $result = $user->find(54);
// var_dump(json_encode($result));

//// done
// $user = new \App\Models\User();
// $result = $user->getAll();
// var_dump($result);

//// done
// $user = new \App\Models\User();
// $result = $user->get(['email','name'],[]);
// var_dump($result);

//// done
// $user = new \App\Models\User();
// $result = $user->get(['id','email','name','password'],['password[!]'=>null]);
// var_dump($result);


//// done
// $user = new \App\Models\User();
// $result = $user->get(['id','email','name','password'],['password[!]'=>null]);
// var_dump($result);

//// done
// $user = new \App\Models\User();
// $result = $user->update(['last_name'=>'james_last_name'],['id[>=]' => 41]);
// var_dump($result);

//// done
//$user = new \App\Models\User();
//$result = $user->delete(['id[>=]' => 70]);
//var_dump($result);

//////// test for product model
// $product = new \App\Models\Product();
// for ($i = 1 ; $i <= 20 ; $i++){
//    $product->create([
//        'id'=> $i,
//        'name' => "product-$i"
//    ]);
//}

// var_dump($product->getAll());

