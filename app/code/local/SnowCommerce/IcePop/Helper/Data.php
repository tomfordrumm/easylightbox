<?php
/**
 * Created by JetBrains PhpStorm.
 * User: svatoslavzilicev
 * Date: 05.09.13
 * Time: 0:22
 * To change this template use File | Settings | File Templates.
 */ 
class SnowCommerce_IcePop_Helper_Data extends Mage_Core_Helper_Abstract {

    const LOGO_WIDTH = 'icepop/img/width_logo';
    const LOGO_HEIGHT = 'icepop/img/height_logo';
    const BANNER_WIDTH = 'icepop/img/width_banner';
    const BANNER_HEIGHT = 'icepop/img/height_banner';

    public function checkBanner($dirImg,$imgName){
            $x = Mage::getStoreConfig(self::BANNER_WIDTH);
            $y = Mage::getStoreConfig(self::BANNER_HEIGHT);
            $dir = Mage::getBaseDir('media').DS.'icepopresized'.DS;
            $imageObj = new Varien_Image($dirImg);
            $imageObj->constrainOnly(true);
            $imageObj->keepAspectRatio(true);
            $imageObj->keepFrame(false);
            $imageObj->backgroundColor(array('255','255','255'));
            $imageObj->keepTransparency(true);
            $imageObj->resize($x, $y);
            $imageObj->save($dir.$imgName);
    }

    public function checkLogo($dirImg,$imgName){
        $x = Mage::getStoreConfig(self::LOGO_WIDTH);
        $y = Mage::getStoreConfig(self::LOGO_HEIGHT);
        $dir = Mage::getBaseDir('media').DS.'icepopresized'.DS;
        $imageObj = new Varien_Image($dirImg);
        $imageObj->constrainOnly(true);
        $imageObj->keepAspectRatio(true);
        $imageObj->keepFrame(false);
        $imageObj->backgroundColor(array('255','255','255'));
        $imageObj->keepTransparency(true);
        $imageObj->resize($x, $y);
        $imageObj->save($dir.$imgName);
    }
}