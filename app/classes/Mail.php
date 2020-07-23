<?php


namespace App\Classes;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mail{
    protected $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer;
        $this->setup();
    }

    public function setup(){
        $this->mail->isSMTP();

        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = 'tls';

        $this->mail->Host = 'smtp.sendgrid.net';
        $this->mail->Port = '587';

        $environment = getenv('APP_ENV');
        if($environment === 'local'){
            $this->mail->SMTPDebug = 2;
        }

        // Authentication info
        $this->mail->Username = 'sarge97';
        $this->mail->Password = 'rrwcscrz1.';

        $this->mail->isHTML(true);

        // Sender information
        $this->mail->setFrom('sirgittarus@gmail.com', 'jalic');
       // $this->mail->FromName = getenv('APP_NAME');
    }

    public function send($data){
        $this->mail->addAddress($data['to'], $data['name']);
        $this->mail->Subject = $data['subject'];
        $this->mail->Body = make($data['view'], array('data' =>$data['body']));

        return $this->mail->send();
    }
}