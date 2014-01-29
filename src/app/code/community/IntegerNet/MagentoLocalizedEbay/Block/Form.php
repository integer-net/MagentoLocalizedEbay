<?php
/**
 * integer_net Magento Module
 *
 * @category   IntegerNet
 * @package    IntegerNet_MagentoLocalizedEbay
 * @copyright  Copyright (c) 2013 integer_net GmbH (http://www.integer-net.de/)
 * @author     Andreas von Studnitz <avs@integer-net.de>
 */

class IntegerNet_MagentoLocalizedEbay_Block_Form extends Mage_Adminhtml_Block_Widget
{
    protected $_htmlData = null;

    /**
     * @param string $moduleName i.e. 'paypal'
     * @param string $areaName i.e. 'short_description'
     * @return string
     */
    public function getAreaHtml($moduleName, $areaName)
    {
        $htmlData = $this->_getHtmlData();
        if (isset($htmlData['ebay'][$moduleName][$areaName])) {
            return $htmlData['ebay'][$moduleName][$areaName];
        }
        return 'text';
    }

    /**
     * @return array
     */
    protected function _getHtmlData()
    {
        if (is_null($this->_htmlData)) {
            $filename = Mage::getModuleDir('etc', 'IntegerNet_MagentoLocalizedEbay') . DS . 'htmldata.json';
            if (is_readable($filename)) {
                $fileContents = file_get_contents($filename);
                try {
                    $this->_htmlData = Zend_Json::decode($fileContents);
                } catch (Exception $e) {
                    Mage::logException($e);
                    $this->_htmlData = array();
                }
            }
        }
        
        return $this->_htmlData;
    }
    
    public function getPayPalDirectUrl()
    {
        return 'https://www.paypal.com/webapps/mpp/referral/paypal-express-checkout?partner_id=NB9WWHYEMVUMS';
    }

    public function getPayPalPopupUrl()
    {
        return Mage::helper('adminhtml')->getUrl('adminhtml/magentolocalizedebay/paypalPopup');
    }

    public function getPayPalConfigUrl()
    {
        return Mage::helper('adminhtml')->getUrl('adminhtml/magentolocalizedebay/paypal');
    }

    public function getPayPalApiUrl()
    {
        return 'https://www.paypal.com/cgi-bin/customerprofileweb?cmd=_profile-api-access';
    }

    public function getPayPalMerchantUrl()
    {
        return 'https://www.paypal.com/de/webapps/mpp/home-merchant';
    }

    public function getBillsafeRegisterUrl()
    {
        return 'http://www.billsafe.de/offer?utm_source=part&utm_medium=magento&utm_campaign=magentoDEEdition';
    }

    public function getEbayRegisterUrl()
    {
        return 'http://pages.ebay.de/help/account/how-to-register.html';
    }

    public function getEbayMerchantUrl()
    {
        return 'https://scgi.ebay.de/ws/eBayISAPI.dll?RegisterEnterInfo&bizflow=2';
    }

    public function getEbayMerchantDocumentationUrl()
    {
        return 'http://pages.ebay.de/gewerblich-verkaufen/';
    }

    public function getEbayStartUrl()
    {
        return 'http://success.ebay.de/ebay-start/?id=m2e';
    }

    public function getM2EUrl()
    {
        return 'http://m2epro.com/';
    }
}