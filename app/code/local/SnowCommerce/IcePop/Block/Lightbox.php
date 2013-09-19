<?php
/**
 * Created by JetBrains PhpStorm.
 * User: svatoslavzilicev
 * Date: 05.09.13
 * Time: 13:12
 * To change this template use File | Settings | File Templates.
 */
class SnowCommerce_IcePop_Block_Lightbox extends Mage_Core_Block_Template{

    public function getLightboxes(){
        $websiteId = Mage::app()->getStore()->getWebsiteId();
//        var_dump($websiteId); exit;
        $collection = Mage::getModel('sc_icepop/lightbox')->getCollection()->addFieldToFilter('website_id',array('eq' => $websiteId));
        return $collection;
    }

    public function getActionForForm($action){
        if ($action == 'mailchimp'){
            $apikey = Mage::getStoreConfig('easylb/mailchimp/apikey');
            $listId = Mage::getStoreConfig('easylb/mailchimp/list_id');
            $http = 'http://<dc>.api.mailchimp.com/1.3/?method=listMemberInfo&apikey='.$apikey.'';

        }
    }

    public function hex2rgb($hex) {
        $hex = str_replace("#", "", $hex);

        if(strlen($hex) == 3) {
            $r = hexdec(substr($hex,0,1).substr($hex,0,1));
            $g = hexdec(substr($hex,1,1).substr($hex,1,1));
            $b = hexdec(substr($hex,2,1).substr($hex,2,1));
        } else {
            $r = hexdec(substr($hex,0,2));
            $g = hexdec(substr($hex,2,2));
            $b = hexdec(substr($hex,4,2));
        }
        $rgb = array($r, $g, $b);
        return implode(",", $rgb);
    }
}