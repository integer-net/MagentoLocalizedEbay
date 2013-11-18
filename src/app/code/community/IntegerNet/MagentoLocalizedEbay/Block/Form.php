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
    public function getPayPalDirectUrl()
    {
        return 'https://www.paypal.com/webapps/mpp/referral/paypal-express-checkout?partner_id=NB9WWHYEMVUMS';
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
}