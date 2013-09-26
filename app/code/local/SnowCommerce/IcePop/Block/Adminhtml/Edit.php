<?php
/**
 * Created by JetBrains PhpStorm.
 * User: svatoslavzilicev
 * Date: 05.09.13
 * Time: 2:00
 * To change this template use File | Settings | File Templates.
 */
class SnowCommerce_IcePop_Block_Adminhtml_Edit extends Mage_Adminhtml_Block_Widget_Form_Container{

    public function __construct(){
        $this->_blockGroup = 'sc_icepop';
        $this->_controller = 'adminhtml';

        parent::__construct();

        $this->_updateButton('save','label',$this->__('Save Light Box'));
//        $this->_addButton('saveancont', array(
//            'label'     => Mage::helper('adminhtml')->__('Save and Continue edit'),
//            'onclick'   => 'saveAndContinueEdit(\'' . $this->getSaveAndContinueUrl() . '\')',
//            'class'     => 'save',
//        ), -1);

        $this->_updateButton('delete','label',$this->__('Delete Light Box'));
    }

    public function getHeaderText(){
        $lightbox = Mage::registry('sc_icepop');
        if ($lightbox->getId()) {
            return $this->__('Edit Light Box');
        }
        else {
            return $this->__('New Light Box');
        }
    }

    /**
     * Retrieve products JSON
     *
     * @return string
     */
    public function getProductsJson()
    {
        return '{}';
    }

    public function getSaveAndContinueUrl()
    {
        return $this->getUrl('*/*/save', array(
            '_current'   => true,
            'back'       => 'edit',
            'active_tab' => null
        ));
    }
}