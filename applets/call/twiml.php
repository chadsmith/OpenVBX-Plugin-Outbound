<?php
$ci =& get_instance();

$number = AppletInstance::getValue('number');
$id = AppletInstance::getValue('flow');
$recipient = normalize_phone_to_E164(str_replace('%sender%', $_REQUEST['From'], AppletInstance::getValue('recipient')));

$ci->twilio = new TwilioRestClient($ci->twilio_sid, $ci->twilio_token, $ci->twilio_endpoint);
if(($flow = OpenVBX::getFlows(array('id' => $id, 'tenant_id' => $ci->tenant->id)))&&$flow[0]->values['data'])
	$ci->twilio->request("Accounts/{$ci->twilio_sid}/Calls", 'POST', array('From' => $number, 'To' => $recipient, 'Url' => site_url('twiml/start/voice/'.$id)));

$response = new Response();

$next = AppletInstance::getDropZoneUrl('next');
if(!empty($next))
	$response->addRedirect($next);

$response->Respond();
