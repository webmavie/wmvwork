<?php
require_once("phpmailer.class.php");

class wmvsmtp {
	private $host;
	private $username;
	private $password;
	public $subject;
	public $message;
	public $sender;

	function __construct ($host="", $username="", $password="", $sender="") {
        if ($sender==""){
            $sender="NO REPLY";
        }

		$this->perfix = array(
                            "host" => $host,
                            "username" => $username,
                            "password" => $password,
                            "sender" => $sender
                        );
        return TRUE;
	}
	
	public function send ($email="", $subject="", $message="") {
	    $server=$this->perfix;
	    $host=trim($server['host']);
        $username=trim($server['username']);
        $password=trim($server['password']);
        $myemail=trim($server['username']);
        $sender=trim($server['sender']);
    
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = "ssl";
        $mail->Port     = 465;  
        $mail->Username = $username;
        $mail->Password = $password;
        $mail->Host     = $host;
        $mail->Mailer   = "smtp";
        $mail->CharSet = "UTF-8";
        $mail->SetFrom($myemail, $sender);
        $mail->AddReplyTo($myemail, $sender);
        $mail->AddAddress($email);	
        $mail->Subject = $subject;
        $mail->WordWrap   = 80;
        $mail->MsgHTML($message);
        $mail->IsHTML(true);
        if(!$mail->Send()) {
            return FALSE;
        } else {
            return TRUE;
        }	
	    
	}
	
}

?>