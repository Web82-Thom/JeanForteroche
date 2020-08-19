<?php

namespace Model;

use Controller\Router;

class ContactManager
{
    public function sendMail()
    {
var_dump('2 traitement du formulaire');
        if(isset($_POST['mailForm'])) {
var_dump($_POST['mailForm']);
            if(!empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['message'])) {
                var_dump($_POST['name']);
                $header="MIME-Version: 1.0\r\n";
                $header.='From:"JeanForteroche.com"<support@jeanforteroche.com>'."\n";
                $header.='Content-Type:text/html; charset="uft-8"'."\n";
                $header.='Content-Transfer-Encoding: 8bit';

                $message='
                <html>
                    <body>
                        <div align="center">
                            <u>Nom de l\'expéditeur :</u>'.$_POST['name'].'<br />
                            <u>Mail de l\'expéditeur :</u>'.$_POST['email'].'<br />
                            <br />
                            '.nl2br($_POST['message']).'
                            <br />
                        </div>
                    </body>
                </html>
                ';

                mail("thom.orta@gmail.com", "CONTACT - jf-blog.com", $message, $header);
                echo "Votre message a bien été envoyé !";
            }
            else
            {
                echo "Tous les champs doivent être complétés !";
            }
        }
    }
}
