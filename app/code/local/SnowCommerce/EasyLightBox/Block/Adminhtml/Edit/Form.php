<?php
/**
 * Created by JetBrains PhpStorm.
 * User: svatoslavzilicev
 * Date: 05.09.13
 * Time: 2:02
 * To change this template use File | Settings | File Templates.
 */
class SnowCommerce_EasyLightBox_Block_Adminhtml_Edit_Form extends Mage_Adminhtml_Block_Widget_Form{
    public function __construct()
    {
        parent::__construct();

        $this->setId('sc_easylb_form');
        $this->setTitle($this->__('Light Box Information'));
    }

    protected function _prepareForm()
    {
        $form = new Varien_Data_Form(array('id' => 'edit_form', 'action' => $this->getUrl('*/*/save'), 'method' => 'post','enctype' => 'multipart/form-data'));
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}