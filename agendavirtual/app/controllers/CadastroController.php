<?php
namespace app\controllers;

use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Models\User;
use Models\Phone;
use Models\Adresse;
use app\src\Validate;
use app\src\Flash;

class CadastroController extends Controller{
    protected $user;
    protected $phone;
    protected $adresse;

    public function __construct(){
        $this->user = new User;
        $this->phone = new Phone;
        $this->adresse = new Adresse;
    }
    
    public function newuser(Request $request, Response $response, Array $args){
        $this->view('cadastro.user', [
            'title' => 'Cadastre-se',
            'users' => $this->user->all()
        ]);
        return $response;
    }
    
    public function storeuser(Request $request, Response $response, Array $args){
        $validate = new Validate;

        $data = $validate->validate([
            'username' => 'required:max@100',
            'email' => 'required:email:unique@user:max@200',
            'password' => 'required:max@200',
            'telephone' => 'tell:max@14',
            'cellphone' => 'cell:max@15',
            'zipcode' => 'cep:max@9',
            'number' => 'max@10',
            'street' => 'max@100',
            'neighborhood' => 'max@100',
            'city' => 'max@100',
            'abbreviation' => 'max@2',
        ]);

        if($validate->hasErrors()){
            return back();
        }
        
        if($data->zipcode){
            $adresse = new Adresse;
            $newaddr = $adresse->firstOrCreate(['zipcode' => $data->zipcode],[
                'street' => $data->street,
                'neighborhood' => $data->neighborhood,
                'city' => $data->city,
                'abbreviation' => $data->abbreviation
            ]);
        } else {
            $newaddr = null;
        }
        // dd($newaddr);
        
        if($data->telephone){
            $phone = new Phone;
            $telephone = $phone->firstOrCreate(['phone' => $data->telephone],[
                'whatsapp' => ($data->telewhats == 'on') ? true : false
            ]);
        } else {
            $telephone = null;
        }
        // dd($telephone);
        
        if($data->cellphone){
            $phone = new Phone;
            $cellphone = $phone->firstOrCreate(['phone' => $data->cellphone],[
                'whatsapp' => ($data->cellwhats == 'on') ? true : false
            ]);
        } else {
            $cellphone = null;
        }
        // dd($cellphone);

        $newuser = new User;
        $newuser->username = $data->username;
        $newuser->email = $data->email;
        $newuser->password = md5($data->password);
        $newuser->adresse_id = $newaddr->id;
        $newuser->number = $data->number;
        $newuser->telephone_id = $telephone->id;
        $newuser->cellphone_id = $cellphone->id;
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