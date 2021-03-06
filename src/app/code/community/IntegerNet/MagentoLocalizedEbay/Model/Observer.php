<?php
/**
 * integer_net Magento Module
 *
 * @category   IntegerNet
 * @package    IntegerNet_MagentoLocalizedEbay
 * @copyright  Copyright (c) 2014 integer_net GmbH (http://www.integer-net.de/)
 * @author     Andreas von Studnitz <avs@integer-net.de>
 */

class IntegerNet_MagentoLocalizedEbay_Model_Observer
{
    public function magentoLocalizedFormSave($observer)
    {
        $params = $observer->getParams();

        if (!isset($params['auto_install']) && $params['paypal_active'] && !Mage::getStoreConfigFlag('payment/paypal_express/active')) {
            Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('magento_localized_ebay')->__(
                'You have successfully activated PayPal payment. Anytime you have the possibility to select advanced settings <a href="%s">here</a>.',
                Mage::helper('adminhtml')->getUrl('adminhtml/magentolocalizedebay/paypal')
            ));
        }

        if (isset($params['paypalplus_active']) && $params['paypalplus_active'] == 1) {
            Mage::getSingleton('magento_localized/installer')->installPackageByName('iways/paypalplus');
            $this->_setConfigData('iways_paypalplus/api/client_id', Mage::helper('core')->encrypt($params['paypalplus_api_client_id']));
            $this->_setConfigData('iways_paypalplus/api/client_secret', Mage::helper('core')->encrypt($params['paypalplus_api_client_secret']));
            $this->_setConfigData('iways_paypalplus/api/mode', ( $params['paypalplus_api_mode'] ? 'sandbox' : 'live'));
            $this->_setConfigData('iways_paypalplus/api/hdrimg', $params['paypalplus_api_hdrimg']);
            $this->_setConfigData('payment/iways_paypalplus_payment/active', 1);
        } else {
            $this->_setConfigData('payment/paypal_express/active', $params['paypal_active']);
            $this->_setConfigData('paypal/wpp/sandbox_flag', $params['paypal_sandbox']);
            $this->_setConfigData('paypal/general/business_account', $params['paypal_express_email']);
            $this->_setConfigData('paypal/wpp/api_username', $this->_encrypt($params['paypal_api_username']));
            $this->_setConfigData('paypal/wpp/api_password', $this->_encrypt($params['paypal_api_password']));
            $this->_setConfigData('paypal/wpp/api_signature', $this->_encrypt($params['paypal_api_signature']));
            $this->_setConfigData('payment/iways_paypalplus_payment/active', 0);
        }
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

    /**
     * Encrypt value before saving
     *
     * @param string $value
     * @return string
     */
    protected function _encrypt($value)
    {
        // don't change value, if an obscured value came
        if (preg_match('/^\*+$/', $value)) {
            return $value;
        }
        if (!empty($value) && ($encrypted = Mage::helper('core')->encrypt($value))) {
            return $encrypted;
        }

        return $value;
    }

}