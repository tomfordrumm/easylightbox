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
}