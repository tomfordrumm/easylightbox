<?php
/**
 * Created by JetBrains PhpStorm.
 * User: svatoslavzilicev
 * Date: 05.09.13
 * Time: 2:05
 * To change this template use File | Settings | File Templates.
 */
class SnowCommerce_IcePop_Block_Adminhtml_Edit_Tab_Main
    extends Mage_Adminhtml_Block_Widget_Form
    implements Mage_Adminhtml_Block_Widget_Tab_Interface{

    /**
     * Prepare content for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return Mage::helper('sc_icepop')->__('Light Box Information');
    }

    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return Mage::helper('sc_icepop')->__('Light Box Information');
    }

    /**
     * Returns status flag about this tab can be showed or not
     *
     * @return true
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * Returns status flag about this tab hidden or not
     *
     * @return true
     */
    public function isHidden()
    {
        return false;
    }

    protected function _prepareForm(){
        $model = Mage::registry('sc_icepop');

        $form = new Varien_Data_Form();
        $form->setHtmlIdPrefix('info_');

        $fieldset = $form->addFieldset('base_fieldset', array(
            'legend'    => Mage::helper('sc_icepop')->__('Information'),
        ));

        if ($model->getId()) {
            $fieldset->addField('entity_id', 'hidden', array(
                'name' => 'entity_id',
            ));
        }

        /**
         * create array of websites
         */
        foreach (Mage::app()->getWebsites() as $website) {
            $options[] = array(
                'value' => $website->getData('website_id'),
                'label' => Mage::helper('sc_icepop')->__($website->getData('name'))
            );
        }


        $fieldset->addField('website_id', 'select', array(
            'name'      => 'website_id',
            'label'     => Mage::helper('sc_icepop')->__('Website Id'),
            'title'     => Mage::helper('sc_icepop')->__('Website Id'),
            'values'    => $options,
            'required'  => true,
        ));




        $fieldset->addField('sign_up_box', 'select', array(
            'name'      => 'sign_up_box',
            'label'     => Mage::helper('sc_icepop')->__('Sign Up Box'),
            'title'     => Mage::helper('sc_icepop')->__('Sign Up Box'),
            'required'  => true,
            'values'    => array(
                array(
                    'value' => 'mailchimp',
                    'label' => Mage::helper('sc_icepop')->__('MailChimp')
                ),
                array(
                    'value' => 'magento',
                    'label' => Mage::helper('sc_icepop')->__('Magento Subscriber')
                ),
                array(
                    'value' => 'constantcontact',
                    'label' => Mage::helper('sc_icepop')->__('Constant Contact')
                ),
            )
        ));

        $fieldset->addField('body_color', 'text', array(
            'name'      => 'body_color',
            'label'     => Mage::helper('sc_icepop')->__('Body Color'),
            'title'     => Mage::helper('sc_icepop')->__('Body Color'),
            'note'      => 'Example: #ffffff',
            'required'  => true,
        ));

        $fieldset->addField('transparency', 'text', array(
            'name'      => 'transparency',
            'label'     => Mage::helper('sc_icepop')->__('Transparency'),
            'title'     => Mage::helper('sc_icepop')->__('Transparency'),
            'note'      => 'From 0 to 1 (Example: 0.6)'
//            'required'  => true,
        ));


        $fieldset->addField('logo', 'image', array(
            'name'      => 'logo',
            'label'     => Mage::helper('sc_icepop')->__('Logo'),
            'title'     => Mage::helper('sc_icepop')->__('Logo'),
//            'required'  => true,
        ));


        $fieldset->addField('banner', 'image', array(
            'name'      => 'banner',
            'label'     => Mage::helper('sc_icepop')->__('Banner'),
            'title'     => Mage::helper('sc_icepop')->__('Banner'),
//            'required'  => true,
        ));

        $fieldset->addField('timeout', 'text', array(
            'name'      => 'timeout',
            'label'     => Mage::helper('sc_icepop')->__('Show Popup After'),
            'title'     => Mage::helper('sc_icepop')->__('Show Popup After'),
            'note'      => 'In seconds',
//            'required'  => true,
        ));

        $fieldset->addField('ttl_cookies', 'text', array(
            'name'      => 'ttl_cookies',
            'label'     => Mage::helper('sc_icepop')->__('Time to live cookies '),
            'title'     => Mage::helper('sc_icepop')->__('Time to live cookies '),
            'note'      => 'In seconds',
//            'required'  => true,
        ));

        $fieldset->addField('round_corner', 'text', array(
            'name'      => 'round_corner',
            'label'     => Mage::helper('sc_icepop')->__('Set Round Corner '),
            'title'     => Mage::helper('sc_icepop')->__('Set Round Corner '),
            'note'      => 'Example: 4px',
//            'required'  => true,
        ));

        $fieldset2 = $form->addFieldset('text_fieldset', array(
            'legend'    => Mage::helper('sc_icepop')->__('Title'),
        ));

        $fieldset2->addField('title_text', 'text', array(
            'name'      => 'title_text',
            'label'     => Mage::helper('sc_icepop')->__('Title Text'),
            'title'     => Mage::helper('sc_icepop')->__('Title Text'),
            'required'  => true,
        ));

        $fieldset2->addField('title_text_size', 'select', array(
            'name'      => 'title_text_size',
            'label'     => Mage::helper('sc_icepop')->__('Title Text Size'),
            'title'     => Mage::helper('sc_icepop')->__('Title Text Size'),
            'required'  => true,
            'values'   => array(
                array(
                    'value' => 1,
                    'label' => Mage::helper('sc_icepop')->__('Small'),
                ),
                array(
                    'value' => 2,
                    'label' => Mage::helper('sc_icepop')->__('Medium'),
                ),
                array(
                    'value' => 3,
                    'label' => Mage::helper('sc_icepop')->__('Big'),
                ),
            )
        ));

        $fieldset2->addField('title_text_bold', 'checkbox', array(
            'name'      => 'title_text_bold',
            'label'     => Mage::helper('sc_icepop')->__('Is Bold?'),
            'title'     => Mage::helper('sc_icepop')->__('Is Bold?'),
            'onclick'   => 'this.value = this.checked ? 1 : 0;',
//            'required'  => true,
        ));

        $fieldset2->addField('title_text_color', 'text', array(
            'name'      => 'title_text_color',
            'label'     => Mage::helper('sc_icepop')->__('Title Text Color'),
            'title'     => Mage::helper('sc_icepop')->__('Title Text Color'),
            'required'  => true,
            'note'      => 'Example: #ffffff'
        ));

        $fieldset3 = $form->addFieldset('action_text_fieldset', array(
            'legend'    => Mage::helper('sc_icepop')->__('Action Text'),
        ));

        $fieldset3->addField('action_text', 'text', array(
            'name'      => 'action_text',
            'label'     => Mage::helper('sc_icepop')->__('Action Text'),
            'title'     => Mage::helper('sc_icepop')->__('Action Text'),
            'required'  => true,
        ));

        $fieldset3->addField('action_text_size', 'select', array(
            'name'      => 'action_text_size',
            'label'     => Mage::helper('sc_icepop')->__('Action Text Size'),
            'title'     => Mage::helper('sc_icepop')->__('Action Text Size'),
            'required'  => true,
            'values'   => array(
                array(
                    'value' => 1,
                    'label' => Mage::helper('sc_icepop')->__('Small'),
                ),
                array(
                    'value' => 2,
                    'label' => Mage::helper('sc_icepop')->__('Medium'),
                ),
                array(
                    'value' => 3,
                    'label' => Mage::helper('sc_icepop')->__('Big'),
                ),
            )
        ));

        $fieldset3->addField('action_text_bold', 'checkbox', array(
            'name'      => 'action_text_bold',
            'label'     => Mage::helper('sc_icepop')->__('Is Bold?'),
            'title'     => Mage::helper('sc_icepop')->__('Is Bold?'),
            'onclick'   => 'this.value = this.checked ? 1 : 0;',
//            'required'  => true,
        ));

        $fieldset3->addField('action_text_color', 'text', array(
            'name'      => 'action_text_color',
            'label'     => Mage::helper('sc_icepop')->__('Action Text Color'),
            'title'     => Mage::helper('sc_icepop')->__('Action Text Color'),
            'required'  => true,
            'note'      => 'Example: #ffffff'
        ));

        $fieldset4 = $form->addFieldset('action_buttton_text_fieldset', array(
            'legend'    => Mage::helper('sc_icepop')->__('Action Button Text'),
        ));

        $fieldset4->addField('action_button', 'text', array(
            'name'      => 'action_button',
            'label'     => Mage::helper('sc_icepop')->__('Action Button Text'),
            'title'     => Mage::helper('sc_icepop')->__('Action Button Text'),
            'required'  => true,
        ));

        $fieldset4->addField('action_button_text_color', 'text', array(
            'name'      => 'action_button_text_color',
            'label'     => Mage::helper('sc_icepop')->__('Action Button Text Color'),
            'title'     => Mage::helper('sc_icepop')->__('Action Button Text Color'),
            'required'  => true,
            'note'      => 'Example: #ffffff'
        ));

        $fieldset4->addField('action_button_color', 'text', array(
            'name'      => 'action_button_color',
            'label'     => Mage::helper('sc_icepop')->__('Action Button Color'),
            'title'     => Mage::helper('sc_icepop')->__('Action Button Color'),
            'required'  => true,
            'note'      => 'Example: #ffffff'
        ));
        $ttb = $model->getData('title_text_bold');
        $atb = $model->getData('action_text_bold');
        $form->getElement('title_text_bold')->setIsChecked(!empty($ttb));
        $form->getElement('action_text_bold')->setIsChecked(!empty($atb));
        $form->setValues($model->getData());
//        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();

    }
    
    
}