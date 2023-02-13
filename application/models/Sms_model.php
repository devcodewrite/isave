<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once (APPPATH.'Zenoph/Notify/AutoLoader.php');

use Zenoph\Notify\Enums\AuthModel;
use Zenoph\Notify\Request\NotifyRequest;
use Zenoph\Notify\Request\SMSRequest;
use Zenoph\Notify\Enums\TextMessageType;
use Zenoph\Notify\Store\MessageReport;

/**
 * Sms model class 
 *
 * @copyright  @2022 Codewrite Technology Ltd
 * @version    Release: version 1.0.0
 * @since      Class available since Release 1.0.0
 */ 

class Sms_model extends CI_Model {
    
    var $table = 'sms';
    var $hasOne = ['users' => 'added_by'];

    public function sendPersonalised(string $msg,array $data)
    {
        $result = new stdClass();

        try {
            NotifyRequest::setHost($this->config->item('sms_host'));
            if(ENVIRONMENT !== 'development'){
                NotifyRequest::useSecureConnection(true);
            }
            
            // initialise request
            $smsReq = new SMSRequest();
            $smsReq->setAuthModel(AuthModel::API_KEY);
            $smsReq->setAuthApiKey($this->config->item('sms_api_key'));
            
            $smsReq->setSender($this->config->item('sms_sender_id')); 
            $smsReq->setMessage($msg);
            $smsReq->setMessageType(TextMessageType::TEXT);
            
            $smsCount = 0;
            // add personalised data to destinations
            foreach ($data as $item){
                $phone = $item['phone'];
                unset($item['phone']);
                $values = array_values($item);
                $smsCount++;
                $smsReq->addPersonalisedDestination($phone, false, $values);
            }
            
            // submit must be after the loop
            $msgResp = $smsReq->submit();
            if($msgResp->getHttpStatusCode()){
                $smsUnits = $this->setting->getValue('sms_units', 0);
                $this->setting->setValue('sms_units', $smsUnits - $smsCount);
                $result->status = true;
            }
            else {
                $result->status = false;
                $result->message = "Message couldn't be sent!";
            }
        } 
        
        catch (\Exception $ex) {
           $result->status = false;
           $result->message = printf("Error: %s.",  $ex->getMessage());
        }

        return $result;
    }
}