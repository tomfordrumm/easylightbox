<?php
/**
 * Created by JetBrains PhpStorm.
 * User: svatoslavzilicev
 * Date: 05.09.13
 * Time: 13:12
 * To change this template use File | Settings | File Templates.
 */
class SnowCommerce_EasyLightBox_Block_Lightbox extends Mage_Core_Block_Template{

    public function getLightboxes(){
        $websiteId = Mage::app()->getStore()->getWebsiteId();
//        var_dump($websiteId); exit;
        $collection = Mage::getModel('sc_easylb/lightbox')->getCollection()->addFieldToFilter('website_id',array('eq' => $websiteId));
        return $collection;
    }

    public function getActionForForm($action){
        if ($action == 'mailchimp'){
            $apikey = Mage::getStoreConfig('easylb/mailchimp/apikey');
            $listId = Mage::getStoreConfig('easylb/mailchimp/list_id');
            $http = 'http://<dc>.api.mailchimp.com/1.3/?method=listMemberInfo&apikey='.$apikey.'';

        }
    }
}