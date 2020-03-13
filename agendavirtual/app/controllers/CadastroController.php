<?php
namespace app\controllers;

use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Models\User;
use app\src\Validate;

class CadastroController extends Controller{
    protected $user;

    public function __construct(){
        $this->user = new User;
    }
    
    public function index(Request $request, Response $response, Array $args){
        $this->view('cadastro.user', [
            'title' => 'Cadastre-se',
            'users' => $this->user->all()
        ]);
        return $response;
    }
    
    public function store(Request $request, Response $response, Array $args){
        // dd($request->parsebody);
        $validate = new Validate;

        $data = $validate->validate([
            'username' => 'required:max@10',
            'email' => 'required:email',
            'password' => 'required'
        ]);

        // dd($validate);
        // dd($validate->error());

        if($validate->hasErrors()){
            return back();
        }
        
        // dd($data);

        $user = new User;
        $user->username = $_POST['username'];
        $user->email = $_POST['email'];
        $user->password = md5($_POST['password']);
        // dd($user);
        $user->save();
                
        $users = new User;
        $users = User::all();
        


        $this->view('home', [
            'title' => 'Home',
            '$users' => $users
        ]);

        return $response;
    }

    // public function newuser(Request $request, Response $response, Array $args){
    //     $newuser = User::create($args);
        
    //     $this->view('home', [
    //         'title' => 'Home',
    //         'user' => $newuser
    //     ]);
    //     return $response;
    // }
}