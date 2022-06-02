<?php

namespace App\Controllers;
use PHPMailer\PHPMailer\PHPMailer;
use App\Core\App;
use Exception;


class ContatoController
{

    public function view()
    {
        return view('site/contato');
    }

    public function enviaEmail(){
        $dados = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'assunto' => $_POST['assunto'],
            'mensagem' => $_POST['mensagem']
        ];

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Username = 'adm.monstershop@gmail.com';
        $mail->Password = 'mdhvhdgqsqsfaoro';
        $mail->Port = 587;
        $mail->setFrom($dados['email']);
        $mail->addAddress('adm.monstershop@gmail.com');
        
        $mail->isHTML(true);
        $mail->Subject = $dados['assunto'];
        $mail->Body = nl2br("Nome: {$dados['nome']}<br>Email: {$dados['email']}<br>Mensagem: {$dados['mensagem']}");
        $mail->AltBody = nl2br(strip_tags($dados['mensagem']));

        if(!$mail->send()) {
            echo 'Não foi possível enviar a mensagem.<br>';
            echo 'Erro: ' . $mail->ErrorInfo;
        }else
            header('Location: /contato');
    }
}
