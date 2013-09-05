<?php
/**
 * Created by JetBrains PhpStorm.
 * User: svatoslavzilicev
 * Date: 05.09.13
 * Time: 1:41
 * To change this template use File | Settings | File Templates.
 */
class SnowCommerce_EasyLightBox_Block_Adminhtml_Grid extends Mage_Adminhtml_Block_Widget_Grid{

    public function __construct(){
        parent::__construct();
        $this->setId('easylbGrid');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _getStore()
    {
        $storeId = (int)$this->getRequest()->getParam('store', 0);

        return Mage::app()->getStore($storeId);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('sc_easylb/lightbox')->getCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _addColumnFilterToCollection($column)
    {
        return parent::_addColumnFilterToCollection($column);
    }

    protected function _prepareColumns()
    {
        $this->addColumn('entity_id', array(
                'header' => Mage::helper('sc_easylb')->__('ID #'),
                'width'  => '10px',
                'align'  => 'right',
                'type'   => 'text',
                'index'  => 'entity_id',
            )
        );
        $this->addColumn('website_id', array(
                'header'   => Mage::helper('sc_easylb')->__('Website'),
                'width'    => '30px',
//                'type'     => 'text',
                'index'    => 'website_id',
//                'renderer' => 'SnowCommerce_CSM_Block_Adminhtml_Grid_Websiterender',
            )
        );

        $this->addColumn('title_text', array(
                'header' => Mage::helper('sc_easylb')->__('Title Text'),
//                'width'  => '20px',
                'type'   => 'text',
                'index'  => 'title_text',
            )
        );
//
//        $this->addColumn('dest_region_id', array(
//                'header' => Mage::helper('sc_easylb')->__('State/Region'),
//                'width'  => '20px',
//                'index'  => 'dest_region_id',
//                'type'   => 'text'
//            )
//        );
//        $this->addColumn('dest_city', array(
//                'header'   => Mage::helper('sc_easylb')->__('City'),
//                'width'    => '20px',
//                'index'    => 'dest_city',
//            )
//        );
//
//        $this->addColumn('price',array(
//                'header' => Mage::helper('sc_easylb')->__('Price'),
//                'width'  => '50px',
//                'type'   => 'text',
//                'align'  => 'right',
//                'index'  => 'price',
//            )
//        );
//
//        $this->addColumn('delivery_type', array(
//                'header'   => Mage::helper('sc_easylb')->__('Delivery Type'),
//                'width'    => '250px',
//                'index'    => 'delivery_type',
//                'type'     => 'text',
//            )
//        );
//        $this->addColumn('is_active', array(
//                'header'   => Mage::helper('sc_easylb')->__('Active'),
//                'width'    => '50px',
//                'index'    => 'is_active',
//                'renderer' => 'SnowCommerce_CSM_Block_Adminhtml_Grid_Renderer',
////                'type'     => 'text',
//
//            )
//        );

        return parent::_prepareColumns();
    }

    public function _prepareMassaction(){
        $this->setMassactionIdField('entity_id');
        $this->getMassactionBlock()->setFormFieldName('shipping');

        $this->getMassactionBlock()->addItem('delete', array(
            'label'=> Mage::helper('catalog')->__('Delete'),
            'url'  => $this->getUrl('*/*/massDelete'),
            'confirm' => Mage::helper('catalog')->__('Are you sure?')
        ));

        return $this;
    }

    /**
     * Row click url
     *
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('entity_id' => $row->getId()));
    }
}