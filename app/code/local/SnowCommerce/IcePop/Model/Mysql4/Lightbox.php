<?php
/**
 * Created by JetBrains PhpStorm.
 * User: svatoslavzilicev
 * Date: 05.09.13
 * Time: 1:43
 * To change this template use File | Settings | File Templates.
 */
class SnowCommerce_IcePop_Model_Mysql4_Lightbox extends Mage_Core_Model_Mysql4_Abstract{

    protected  function _construct(){
        $this->_init('sc_icepop/sc_icepop','entity_id');
    }
}