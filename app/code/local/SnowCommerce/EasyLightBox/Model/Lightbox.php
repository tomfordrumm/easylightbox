<?php
/**
 * Created by JetBrains PhpStorm.
 * User: svatoslavzilicev
 * Date: 05.09.13
 * Time: 1:43
 * To change this template use File | Settings | File Templates.
 */
class SnowCommerce_EasyLightBox_Model_Lightbox extends Mage_Core_Model_Abstract{

    protected  function _construct(){
        $this->_init('sc_easylb/lightbox');
    }

    public function getMailChimp($email){
        $apikey = Mage::getStoreConfig('easylb/mailchimp/apikey');
        $listId = Mage::getStoreConfig('easylb/mailchimp/list_id');
        $sd = Mage::getStoreConfig('easylb/mailchimp/sd');
        $params = array("id" => $listId, "email" => array('email' => $email), "merge_vars" => null, "email_type" => 'html', "double_optin" => true, "update_existing" => false, "replace_interests" => true, "send_welcome" => false);

        $params['apikey'] = $apikey;

        $params = json_encode($params);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://'.$sd.'.api.mailchimp.com/2.0/' . 'lists/subscribe' . '.json');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_VERBOSE, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $start = microtime(true);

        $response_body = curl_exec($ch);
        $info = curl_getinfo($ch);
        $time = microtime(true) - $start;

        if(floor($info['http_code'] / 100) >= 4) {
            return false;
        }

        $result = json_decode($response_body, true);


        return $result;
    }
}