<?php
$ci =& get_instance();

$number = AppletInstance::getValue('number');
$recipient = normalize_phone_to_E164(AppletInstance::getValue('recipient'));
$message = AppletInstance::getValue('sms');

$from = normalize_phone_to_E164($_REQUEST['From']);
$to = normalize_phone_to_E164($_REQUEST['To']);

if(AppletInstance::getFlowType() == 'voice')
	$message = str_replace(array('%caller%', '%number%'), array($from, $to), $message);
else
	$message = str_replace(array('%sender%', '%number%', '%body%'), array($from, $to, $_REQUEST['Body']), $message);

require_once(APPPATH . 'libraries/twilio.php');
$ci->twilio = new TwilioRestClient($ci->twilio_sid, $ci->twilio_token, $ci->twilio_endpoint);
$ci->twilio->request("Accounts/{$ci->twilio_sid}/SMS/Messages", 'POST', array('From' => $number, 'To' => $recipient, 'Body' => $message));

$response = new Response();

$next = AppletInstance::getDropZoneUrl('next');
if(!empty($next))
	$response->addRedirect($next);

$response->Respond();
