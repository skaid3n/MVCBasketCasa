<?php

   # PHP Mailer
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/SMTP.php';
   
    Class registro_email extends PHPMailer {

        function __construct($name, $email, $pass) {

            parent::__construct();

            # Propiedades de mi clase email
            $this->destinatario = $email;
            $this->asunto ="Registro en la Base de Datos de Baloncesto de Antonio Pavón";
            
            # Cuerpo del mensaje
            $this->mensaje = "
            <p>Hola $name:</p>
            <p>Su registro en la web de <b>Baloncesto</b> ha sido un éxito. Le facilitamos en este correo sus datos: </p>
            <ul>
                <li>Nombre de usuario: $name </li>
                <li>Correo Electrónico:  $email </li>
                <li>Password: $pass</li>
            </ul>
            <p>Un saludo, Antonio Miguel Pavón Rodriguez</p>
            ";


            # configuración resto de parámetros
            $this->CharSet = "UTF-8";
            $this->Encoding = "quoted-printable";

            $this->SMTPDebug = false;
            $this->do_debug = 0;
            $this->isSMTP(); 

            //Server settings smtp gthis
            //Nos vamos a el perfil de la cuenta de gthis
            //Activamos la opción de seguridad autentificación a 2 pasos
            //Generamos una contraseña Temporal
            //Dicha contraseña la pegamos en la propiedad Password
            
            $this->Username = 'arkanoprimal@gmail.com';         
            $this->Password = 'egyrqvhjtzyfaryj'; 

            $this->SMTPDebug = 0; 
            $this->SMTPSecure = 'tls'; 
            $this->Host = 'smtp.gmail.com'; 
            $this->Port = 587;                               
                                                
            $this->SMTPAuth = true;   

        }

        function enviar_email() {

            $this->setFrom ($this->destinatario); 
            $this->addAddress ($this->destinatario); 
            $this->Subject = $this->asunto;
            $this->isHTML(true);

            $this->Body = $this->mensaje;

            $mensaje = null;
            try {
                $this->send(); 

            } 	catch (Exception $e) {

                $mensaje='Message could not be sent. thiser Error: '. $this->ErrorInfo;

            }

            return $mensaje;


        }
    }
?>