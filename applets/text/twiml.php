<?php
$ci =& get_instance();

if(!empty($_REQUEST['From'])) {
	$from = normalize_phone_to_E164($_REQUEST['From']);
	$to = normalize_phone_to_E164($_REQUEST['To']);

    $number = AppletInstance::getValue('number');
    $recipient = str_replace(array('%caller%', '%number%'), array($from, $to), AppletInstance::getValue('recipient'));
    $recipient = normalize_phone_to_E164($recipient);
    $message = AppletInstance::getValue('sms');

	if(AppletInstance::getFlowType() == 'voice')
		$message = str_replace(array('%caller%', '%number%'), array($from, $to), $message);
	else
		$message = str_replace(array('%sender%', '%number%', '%body%'), array($from, $to, $_REQUEST['Body']), $message);

    require_once(APPPATH . 'libraries/Services/Twilio.php');
    $service = new Services_Twilio($ci->twilio_sid, $ci->twilio_token);
    $service->account->sms_messages->create($number, $recipient, $message);
}

$response = new TwimlResponse;

$next = AppletInstance::getDropZoneUrl('next');
if(!empty($next))
	$response->redirect($next);

$response->respond();
