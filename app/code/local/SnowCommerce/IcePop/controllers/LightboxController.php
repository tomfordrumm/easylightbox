<?php
/**
 * Created by JetBrains PhpStorm.
 * User: svatoslavzilicev
 * Date: 05.09.13
 * Time: 23:56
 * To change this template use File | Settings | File Templates.
 */
class SnowCommerce_IcePop_LightboxController extends Mage_Core_Controller_Front_Action{

    public function sendAction(){
        $session            = Mage::getSingleton('core/session');
        $method = $this->getRequest()->getParam('method');
        if ($method == 'mailchimp'){
            $status =  Mage::getModel('sc_icepop/lightbox')->getMailChimp($this->getRequest()->getParam('email'));
            if ($status){
                $session->addSuccess($this->__('Thank you for your subscription.'));
            } else {
                $session->addError($this->__('Something wrong. Please, contact us.'));
            }
        }
        if ($method == 'magento'){
            $status = Mage::getModel('newsletter/subscriber')->subscribe($this->getRequest()->getParam('email'));
            if ($status == Mage_Newsletter_Model_Subscriber::STATUS_NOT_ACTIVE) {
                $session->addSuccess($this->__('Confirmation request has been sent.'));
            }
            else {
                $session->addSuccess($this->__('Thank you for your subscription.'));
            }
        }

        $this->_redirect('home');
    }
}