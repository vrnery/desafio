<?php
namespace app\controllers;

use app\src\Email;
use app\src\Flash;
use app\src\Validate;
use Slim\Psr7\Request;
use Slim\Psr7\Response;
use app\templates\Contact;

class ContactController extends Controller
{

    public function __construct()
    {
    }

    public function index(Request $request, Response $response, array $args)
    {
        $this->view('contact.index', [
            'title' => 'Contato',
        ]);
        return $response;
    }

    public function store(Request $request, Response $response, array $args)
    {
        $validate = new Validate;

        $data = $validate->validate([
            'nome' => 'required:max@100',
            'email' => 'required:email:max@200',
            'assunto' => 'required',
            'mensagem' => 'required',
        ]);

        if ($validate->hasErrors()) {
            return back();
        }

        $email = new Email;
        $email->data([
            'fromEmail' => $data->email,
            'fromName' => $data->nome,
            'toEmail' => 'dvrnery@gmail.com',
            'toName' => 'AgendaVirtual',
            'subject' => $data->assunto,
            'message' => $data->mensagem,
        ])->template(new Contact)->send();
        // dd($data);

        Flash('message', success('Contato enviado com sucesso!'));

        return redirect('/');

    }
}
