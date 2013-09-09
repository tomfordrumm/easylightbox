<?php
/**
 * Created by JetBrains PhpStorm.
 * User: svatoslavzilicev
 * Date: 05.09.13
 * Time: 1:38
 * To change this template use File | Settings | File Templates.
 */
class SnowCommerce_IcePop_Block_Adminhtml_Lightbox extends Mage_Adminhtml_Block_Widget_Grid_Container{

    public function __construct(){
        $this->_blockGroup = 'sc_icepop';
        $this->_controller = 'adminhtml';
        $this->_headerText = $this->__('Light Box Manager');
        parent::__construct();
    }
}