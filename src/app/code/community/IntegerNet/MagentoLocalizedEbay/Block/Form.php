<?php
/**
 * integer_net Magento Module
 *
 * @category   IntegerNet
 * @package    IntegerNet_MagentoLocalizedEbay
 * @copyright  Copyright (c) 2013 integer_net GmbH (http://www.integer-net.de/)
 * @author     Andreas von Studnitz <avs@integer-net.de>
 */

class IntegerNet_MagentoLocalizedEbay_Block_Form extends Mage_Adminhtml_Block_Template
{
    public function getBillsafeRegisterUrl()
    {
        return 'http://www.billsafe.de/offer?utm_source=part&utm_medium=magento&utm_campaign=magentoDEEdition';
    }
}