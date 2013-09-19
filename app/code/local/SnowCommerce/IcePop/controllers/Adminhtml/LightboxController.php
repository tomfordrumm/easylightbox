<?php
/**
 * Created by JetBrains PhpStorm.
 * User: svatoslavzilicev
 * Date: 05.09.13
 * Time: 1:32
 * To change this template use File | Settings | File Templates.
 */
class SnowCommerce_IcePop_Adminhtml_LightboxController extends Mage_Adminhtml_Controller_Action{

    public function _initAction(){
        $this->loadLayout()
            ->_setActiveMenu('snowcommerce/easylb')
            ->_addBreadcrumb(Mage::helper('sc_icepop')->__('Easy Light Box'), Mage::helper('sc_icepop')->__('Easy Light Box'));
        $this->_title($this->__('sc_icepop'))->_title($this->__('Easy Light Box'));

        return $this;
    }

    public function indexAction(){
        $this->_initAction()
            ->renderLayout();

    }

    public function newAction(){
        $this->_forward('edit');
    }

    public function editAction(){
        $this->_initAction();
        $model = Mage::getModel('sc_icepop/lightbox');
        if ($this->getRequest()->getParam('entity_id')){
            $model->load($this->getRequest()->getParam('entity_id'));
        }
        Mage::register('sc_icepop',$model);
           $this->renderLayout();
    }

    public function saveAction(){
//        $redirectBack   = $this->getRequest()->getParam('back', false);
        $id             = $this->getRequest()->getParam('entity_id');
        $data           = $this->getRequest()->getParams();
        $model = Mage::getModel('sc_icepop/lightbox');
        try {
            if ($id) {
                $model->load($id);
            }

            if (isset($_FILES['logo']['name']) and (file_exists($_FILES['logo']['tmp_name']))) {
                try {
                    $uploader = new Varien_File_Uploader('logo');
                    $uploader->setAllowedExtensions(array('jpg', 'jpeg', 'gif', 'png')); // or pdf or anything


                    $uploader->setAllowRenameFiles(false);

                    // setAllowRenameFiles(true) -> move your file in a folder the magento way
                    // setAllowRenameFiles(true) -> move your file directly in the $path folder
                    $uploader->setFilesDispersion(false);

                    $path = Mage::getBaseDir('media') . DS;

                    $uploader->save($path, $_FILES['logo']['name']);

                    $data['logo'] = $_FILES['logo']['name'];
                } catch (Exception $e) {

                }
            } else {

                if (isset($data['logo']['delete']) && $data['logo']['delete'] == 1)
                    $data['logo'] = '';
                else
                    unset($data['logo']);
            }
            if (isset($_FILES['banner']['name']) and (file_exists($_FILES['banner']['tmp_name']))) {
                try {
                    $uploader = new Varien_File_Uploader('banner');
                    $uploader->setAllowedExtensions(array('jpg', 'jpeg', 'gif', 'png')); // or pdf or anything


                    $uploader->setAllowRenameFiles(false);

                    // setAllowRenameFiles(true) -> move your file in a folder the magento way
                    // setAllowRenameFiles(true) -> move your file directly in the $path folder
                    $uploader->setFilesDispersion(false);

                    $path = Mage::getBaseDir('media') . DS;

                    $uploader->save($path, $_FILES['banner']['name']);

                    $data['banner'] = $_FILES['banner']['name'];
                } catch (Exception $e) {

                }
            } else {

                if (isset($data['banner']['delete']) && $data['banner']['delete'] == 1)
                    $data['banner'] = '';
                else
                    unset($data['banner']);
            }

            Mage::log($data);
            $model->setData($data);
            $model->save();
            $this->_getSession()->addSuccess($this->__('Lightbox successfuly saved'));
        } catch (Exception $e) {
            $this->_getSession()->addError($e->getMessage());
        }


        $this->_redirect('*/*/');
    }
}