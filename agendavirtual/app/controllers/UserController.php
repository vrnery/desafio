<?php
namespace app\controllers;

// use app\src\Flash;
use app\src\Image;
use app\src\Password;
use app\src\Validate;
use Models\Adresse;
use Models\Phone;
use Models\User;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class UserController extends Controller
{
    protected $user;
    protected $phone;
    protected $address;

    public function __construct()
    {
        $this->user = new User;
        $this->phone = new Phone;
        $this->address = new Adresse;
    }

    public function index(Request $request, Response $response, array $args)
    {
        $this->view('user.index', [
            'title' => 'Cadastre-se',
        ]);
        return $response;
    }

    public function store(Request $request, Response $response, array $args)
    {
        $validate = new Validate;

        $data = $validate->validate([
            'username' => 'required:max@100',
            'email' => 'required:email:unique@user:max@200',
            'password' => 'required:max@200',
        ]);

        if ($validate->hasErrors()) {
            return back();
        }

        $newuser = new User;
        $newuser->username = $data->username;
        $newuser->email = $data->email;
        $newuser->password = Password::make($data->password);
        $newuser->photo = "/assets/imgs/photos/defaults/user.png";
        $this->user = $newuser->save();

        if ($this->user) {
            flash('message', success('Cadastrado com sucesso!'));

            return redirect('/');
        }

        return back();
    }

    public function edit(Request $request, Response $response, array $args)
    {
        $userLogado = $this->user->find($_SESSION['id_user'])->first();
        $userLogado->telephone = $userLogado->telephone()->first();
        $userLogado->cellphone = $userLogado->cellphone()->first();
        $userLogado->address = $userLogado->adresse()->first();

        $this->view('user.edit', [
            'title' => 'Editar perfil',
            'user' => $userLogado,
        ]);
        return $response;
    }

    public function update(Request $request, Response $response, array $args)
    {
        $validate = new Validate;
        $data = $validate->validate([
            'username' => 'required:max@100',
            'password' => 'max@200',
            'telephone' => 'tele:max@14',
            'cellphone' => 'cell:max@15',
            'zipcode' => 'cep:max@9',
            'number' => 'max@10',
            'street' => 'max@100',
            'neighborhood' => 'max@100',
            'city' => 'max@100',
            'abbreviation' => 'max@2',
            'email' => 'required:email:max@200',
        ]);

        if ($validate->hasErrors()) {
            return back();
        }

        $upuser = $this->user->find($_SESSION['id_user'])->first();

        $upuser->username = $data->username;

        if ($upuser->email != $data->email) {
            $email = $validate->validate([
                'email' => 'unique@user',
            ]);
            
            if ($validate->hasErrors()) {
                return back();
            }

            $upuser->email = $data->email;
        }

        if ($data->password) {
            $upuser->password = Password::make($data->password);
        }

        if ($data->telephone) {
            $upuser->telephone_id = $this->phone->firstOrCreate(['phone' => $data->telephone])->id;
            $upuser->telephone()->update(['whatsapp' => ($_POST['telewhats'] == 'on') ? true : false]);
        } else {
            $upuser->telephone_id = null;
        }

        if ($data->cellphone) {
            $upuser->cellphone_id = $this->phone->firstOrCreate(['phone' => $data->cellphone])->id;
            $upuser->cellphone()->update(['whatsapp' => ($_POST['cellwhats'] == 'on') ? true : false]);
        }

        if ($data->zipcode) {
            $upuser->adresse_id = $this->address->firstOrCreate(['zipcode' => $data->zipcode], [
                'street' => $data->street,
                'neighborhood' => $data->neighborhood,
                'city' => $data->city,
                'abbreviation' => $data->abbreviation,
            ])->id;
        } else {
            $upuser->adresse_id = null;
        }

        $upuser->number = $data->number;
        $this->user = $upuser->push();

        if ($this->user) {
            flash('message', success('Atualizado com sucesso!'));
        }

        return back();
    }

    public function file()
    {
        $validate = new Validate;
        $data = $validate->validate([
            'file' => 'image',
        ]);
        if ($validate->hasErrors()) {
            return back();
        }

        $image = new Image('file');
        $upfoto = $this->user->find($_SESSION['id_user']);
        if (strrpos($upfoto->photo, "user.png") === false) {
            $image->delete($upfoto->photo);
        }

        $image->size('user')->upload();
        $this->user->where('id', 1)->update([
            'photo' => "/assets/imgs/photos/{$image->getName()}",
        ]);

        flash('message', success('Upload feito com sucesso'));
        return back();
    }
}
