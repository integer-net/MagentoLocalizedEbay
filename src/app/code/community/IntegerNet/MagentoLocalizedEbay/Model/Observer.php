<?php
/**
 * integer_net Magento Module
 *
 * @category   IntegerNet
 * @package    IntegerNet_MagentoLocalizedEbay
 * @copyright  Copyright (c) 2013 integer_net GmbH (http://www.integer-net.de/)
 * @author     Andreas von Studnitz <avs@integer-net.de>
 */

class IntegerNet_MagentoLocalizedEbay_Model_Observer
{
    public function magentoLocalizedFormSave($observer)
    {
        $params = $observer->getParams();

        if ($params['billsafe_install'] == 1) {

            Mage::getSingleton('magento_localized/installer')->installPackageByName('billsafe/billsafe');
        }

        $this->_setConfigData('payment/billsafe/active', $params['billsafe_active']);
        $this->_setConfigData('payment/billsafe/sandbox', $params['billsafe_sandbox']);
        $this->_setConfigData('payment/billsafe/merchant_id', $params['billsafe_merchant_id']);
        $this->_setConfigData('payment/billsafe/merchant_license', $params['billsafe_merchant_license']);
    }

    /**
     * Set configuration data
     *
     * @param string $key
     * @param string|int $value
     * @param string $scope
     * @param int $scopeId
     */
    protected function _setConfigData($key, $value, $scope = 'default', $scopeId = 0)
    {
        Mage::getModel('eav/entity_setup', 'core_setup')->setConfigData($key, $value, $scope, $scopeId);
    }
}