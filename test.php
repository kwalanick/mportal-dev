<?php

$to      = "maxwell.munene@aimsoft.co.ke";
					$subject = 'test email';
					$code=rand ( 10000 , 99999 );
					$message = "testing email";
					$headers = 'From: sgf@ikigega.rw' . "\r\n" .
					    'Reply-To:sgf@ikigega.rw' . "\r\n" .
					    'X-Mailer: PHP/' . phpversion();

					mail($to, $subject, $message, $headers);

?>