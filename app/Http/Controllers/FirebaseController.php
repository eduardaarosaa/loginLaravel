<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;

class FirebaseController extends Controller
{
    public function index(){
        
       
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/firebaseKey.json');
        $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->withDatabaseUri('https://loginlaravel-7fd20.firebaseio.com/')
        ->create();
        $database = $firebase->getDatabase();
        $newPost = $database
        ->getReference('sistema/usuarios')
        ->push([
        'nome' => 'Eduarda Rosa',
        'idade' => '21',
        'e-mail' => 'eduardacirina@gmail.com',
        'endereco' => 'Rua das rosas',
        ]);
        //$newPost->getKey(); // => -KVr5eu8gcTv7_AHb-3-
        //$newPost->getUri(); // => https://my-project.firebaseio.com/blog/posts/-KVr5eu8gcTv7_AHb-3-
        //$newPost->getChild('title')->set('Changed post title');
        //$newPost->getValue(); // Fetches the data from the realtime database
        //$newPost->remove();
        echo"<pre>";
        print_r($newPost->getvalue());
        }
}
