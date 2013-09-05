<?php
/**
 * Created by JetBrains PhpStorm.
 * User: svatoslavzilicev
 * Date: 05.09.13
 * Time: 2:02
 * To change this template use File | Settings | File Templates.
 */
class SnowCommerce_EasyLightBox_Block_Adminhtml_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs{

    public function __construct()
    {
        parent::__construct();
        $this->setId('easylb_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('sc_easylb')->__('Information'));
    }
}