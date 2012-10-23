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
 * Data Helper
 * @package Jbh_CartMerge
 */
class Jbh_CartMerge_Helper_Data extends Mage_Core_Helper_Abstract
{

    /**
     * Config path: enabled?
     * @const CONFIG_PATH_MERGE_DISABLED string
     */
    const CONFIG_PATH_MERGE_DISABLED = 'checkout/merge/disabled';

    /**
     * Config path: clean cart if empty
     * @const CONFIG_PATH_MERGE_CLEAN_IF_EMPTY string
     */
    const CONFIG_PATH_MERGE_CLEAN_IF_EMPTY = 'checkout/merge/clean_if_empty';

    /**
     * Return if the module is active
     * @access public
     * @return bool
     */
    public function isActive()
    {
        return $this->isModuleOutputEnabled()
            && Mage::getStoreConfigFlag(self::CONFIG_PATH_MERGE_DISABLED);
    }

    /**
     * Return if we need to clean the customer's cart if the visitor's cart is empty
     * @access public
     * @return bool
     */
    public function cleanIfEmpty()
    {
        Mage::getStoreConfigFlag(self::CONFIG_PATH_MERGE_CLEAN_IF_EMPTY);
    }

}
