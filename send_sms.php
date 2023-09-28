<?php
	function send_sms($message,$mo,$template_id)
		{
		    $ch = curl_init();
			$curlConfig = array(
				CURLOPT_URL            => "http://sms.afgoparrot.com/app/smsapi/index.php",
				CURLOPT_POST           => true,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_POSTFIELDS     => array(
					'key' => '26241882F33DC3',
					'campaign' => '14242',
					'routeid' => '101046',
					'type' => 'text',
					'contacts' => $mo,
					'senderid' => "BHHANU",
					'msg' => $message,
					'template_id' => $template_id,
					'pe_id'    => '1201164121641384258',
				)
			);
			curl_setopt_array($ch, $curlConfig);
			$result = curl_exec($ch);
			curl_close($ch);
		}
?>