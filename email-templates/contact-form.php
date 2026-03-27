<?php
if (!empty($_POST['email'])) {

	$receiver_email = 'harsh.autowebbed@gmail.com';
	$receiver_name  = 'Rituals';
	$subject        = 'Contact Form Details';

	$submits = $_POST;

	$fields = array();
	foreach ($submits as $name => $value) {

		if (empty($value)) continue;

		$name = ucwords(str_replace('_', ' ', $name));

		if (is_array($value)) {
			$value = implode(', ', $value);
		}

		$fields[$name] = htmlspecialchars($value);
	}

	$rows = '';
	foreach ($fields as $key => $val) {
		// $rows .= "<tr><td><b>$key:</b></td><td>$val</td></tr>";
		$rows .= "
			<tr>
              <td style='padding: 8px 0; font-weight: 600'>$key:</td>
              <td style='padding: 8px 0'>$val</td>
            </tr>
			";
	}

	$message = "
<!DOCTYPE html>
<html lang='en' style='margin: 0; padding: 0; font-family: Arial, sans-serif'>
  <body style='background: #f4f6f8; margin: 0; padding: 20px'>
    <table
      width='100%'
      cellpadding='0'
      cellspacing='0'
      style='
        max-width: 600px;
        margin: auto;
        background: #ffffff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      '>
      <tr>
        <td
          style='
            background: #a98e4e;
            padding: 30px;
            color: #ffffff;
            text-align: center;
          '>
          <h2 style='margin: 0; font-size: 22px'>New Inquiry Received</h2>
        </td>
      </tr>

      <tr>
        <td style='padding: 25px'>
          <p style='margin: 0 0 15px; font-size: 16px; color: #333'>
            Hello <strong>Rituals</strong>,
          </p>

          <p style='margin: 0 0 20px; font-size: 15px; color: #555'>
            You have received a new enquiry. Here are the details:
          </p>

          <table
            width='100%'
            cellpadding='0'
            cellspacing='0'
            style='font-size: 14px; color: #444'>
            $rows
          </table>

          <p style='margin: 25px 0 10px; font-size: 15px; color: #333'>
            Best wishes,<br />
            <strong>DigIN Team</strong>
          </p>
        </td>
      </tr>

      <tr>
        <td
          style='
            background: #f1f1f1;
            text-align: center;
            padding: 12px;
            font-size: 12px;
            color: #888;
          '>
          This is an automated message. Please do not reply.
        </td>
      </tr>
    </table>
  </body>
</html>

    ";

	require 'phpmailer/Exception.php';
	require 'phpmailer/PHPMailer.php';
	require 'phpmailer/SMTP.php';

	$mail = new PHPMailer\PHPMailer\PHPMailer();

	$mail->isSMTP();
	$mail->Host       = 'smtp.hostinger.com';
	$mail->SMTPAuth   = true;
	$mail->Username   = 'test@autowebbed.com';
	$mail->Password   = 'Test@09871234';
	$mail->SMTPSecure = 'ssl';
	$mail->Port       = 465;
	// $mail->SMTPDebug = 2; // shows errors
	// $mail->Debugoutput = 'html';

	$mail->setFrom('test@autowebbed.com', 'Website Enquiry');
	$mail->addReplyTo($_POST['email'], $_POST['name']);
	$mail->addAddress($receiver_email, $receiver_name);

	$mail->isHTML(true);
	$mail->Subject = $subject;
	$mail->Body    = $message;

	if ($mail->send()) {
		echo '{ "alert": "alert-success", "message": "Message sent successfully!" }';
	} else {
		echo '{ "alert": "alert-danger", "message": "Mail failed!" }';
	}
} else {
	echo '{ "alert": "alert-danger", "message": "Please add an email address!" }';
}
