<?php
namespace app\controllers;

use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Models\User;
use app\src\Validate;
use app\src\Flash;

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
            'username' => 'required:max@30',
            'email' => 'required:email:unique@user',
            'password' => 'required'
        ]);

        // dd($validate);
        // dd($validate->error());

        if($validate->hasErrors()){
            return back();
        }
        
        // dd($data);

        $newuser = new User;
        $newuser->username = $data->username;
        $newuser->email = $data->email;
        $newuser->password = md5($data->password);
        // dd($user);
        $user = $newuser->save();
        
        if ($user) {
            Flash('message', success('Cadastrado com sucesso!'));

            return redirect('/');
        }

        return back();
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