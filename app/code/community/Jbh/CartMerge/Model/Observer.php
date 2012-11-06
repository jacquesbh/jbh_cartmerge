<?php
/**
 * This file is part of Jbh_CartMerge for Magento.
 *
 * @license Lesser General Public License v3 (http://www.gnu.org/licenses/lgpl-3.0.txt)
 * @author Jacques Bodin-Hullin <jacques@bodin-hullin.net>
 * @category Jbh
 * @package Jbh_CartMerge
 * @copyright Copyright (c) 2012 Jacques Bodin-Hullin (http://jacques.sh/)
 */

/**
 * Observer Model
 * @package Jbh_CartMerge
 */
class Jbh_CartMerge_Model_Observer extends Mage_Core_Model_Abstract
{

    /**
     * Truncate the customer's cart if active
     * @access public
     * @return void
     */
    public function truncateCustomerCart(Varien_Event_Observer $observer)
    {
        if (Mage::helper('jbh_cartmerge')->isActive()) {
            if ($observer->getSource()->hasItems() || Mage::helper('jbh_cartmerge')->cleanIfEmpty()) {
                if (is_object($observer->getQuote()) && $observer->getQuote()->getId()) {
                    $observer->getQuote()->removeAllItems();
                }
            }
        }
    }

}
