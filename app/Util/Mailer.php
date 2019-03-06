<?php
namespace MotivOnline\Util;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;

class Mailer
{
    private $config;
    private $mail;

    public function __construct()
    {
        $this->config = parse_ini_file(__DIR__ . '/../config.conf', true);
        $this->mail = new PHPMailer(true);
        $this->mail->isSMTP();
        $this->mail->SMTPDebug = 2;
        $this->mail->Host = $this->config['MAILER_HOST'];
        $this->mail->SMTPAuth = true;
        $this->mail->AuthType = 'XOAUTH2';
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Port = $this->config['MAILER_PORT'];

        $provider = new Google(
            [
               'clientId' => $this->config['MAILER_CLIENT_ID'],
               'clientSecret' => $this->config['MAILER_CLIENT_SECRET'],
            ]
        );
        $this->mail->setOAuth(
            new OAuth(
                [
                  'provider' => $provider,
                  'clientId' => $this->config['MAILER_CLIENT_ID'],
                  'clientSecret' => $this->config['MAILER_CLIENT_SECRET'],
                  'refreshToken' => $this->config['MAILER_REFRESH_TOKEN'],
                  'userName' => $this->config['MAILER_CLIENT_EMAIL'],
                ]
            )
        );
    }

    public function sendForgetPassword(string $recipientMail, string $link)
    {
        $this->mail->setFrom($this->config['MAILER_CLIENT_EMAIL'], 'Motiv\'Online');
        $this->mail->addAddress($recipientMail);

        $this->mail->isHTML(true);
        $this->mail->Subject = 'Changer de mot de passe';
        $this->mail->Body = '<p>Voici un lien pour changer votre mot de passe ' . $link . ' .</p>';
        $this->mail->send();
    }
}
