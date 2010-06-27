<?php
$ci =& get_instance();

$number = AppletInstance::getValue('number');
$recipient = normalize_phone_to_E164(AppletInstance::getValue('recipient'));
$message = AppletInstance::getValue('sms');

if(AppletInstance::getFlowType() == 'voice'){
	$caller = normalize_phone_to_E164($_REQUEST['Caller']);
	$called = normalize_phone_to_E164($_REQUEST['Called']);
	$message = str_replace(array('%caller%', '%number%'), array($caller, $called), $message);
}
else{
	$from = normalize_phone_to_E164($_REQUEST['From']);
	$to = normalize_phone_to_E164($_REQUEST['To']);
	$message = str_replace(array('%sender%', '%number%', '%body%'), array($from, $to, $_REQUEST['Body']), $message);
}

require_once(APPPATH . 'libraries/twilio.php');
$ci->twilio = new TwilioRestClient($ci->twilio_sid, $ci->twilio_token, $ci->twilio_endpoint);
$response = $ci->twilio->request("Accounts/{$ci->twilio_sid}/SMS/Messages", 'POST', array('To' => $recipient, 'From' => $number, 'Body' => $message));

$response = new Response();

$next = AppletInstance::getDropZoneUrl('next');
if(!empty($next))
	$response->addRedirect($next);

$response->Respond();