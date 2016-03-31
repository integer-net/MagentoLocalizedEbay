<?php
/**
 * Localized Magento Editions
 *
 * @category   IntegerNet
 * @package    IntegerNet_MagentoLocalized
 * @copyright  Copyright (c) 2014 integer_net GmbH (http://www.integer-net.de/)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author     Andreas von Studnitz <avs@integer-net.de>
 */

class IntegerNet_MagentoLocalizedEbay_Adminhtml_MagentoLocalizedEbayController extends Mage_Adminhtml_Controller_Action
{
    public function paypalAction()
    {
        $this->_forward('edit', 'system_config', 'admin', array('section' => 'payment'));
    }

    public function paypalPopupAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('system/magento_localized') ||  Mage::getSingleton('admin/session')->isAllowed('magento_localized');
    }
}
