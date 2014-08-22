<?php
/**
 * Helper
 *
 * @category   Flagbit
 * @package    Flagbit_ScheduleDebug
 */
class Flagbit_ScheduleDebug_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Hit database to get price differences between catalog tables and flat tables
     *
     * @param Varien_Db_Adapter_Interface $connection
     * @return array
     */
    public function getPriceDifferencesResultSet($connection) {

        $allStores = Mage::app()->getStores();
        $result = array();
        // raw database query, we can do it better :P
        foreach ($allStores as $storeId => $storeVal)
        {
            /** @var Mage_Catalog_Model_Resource_Product_Flat $flatTableName */
            $flatTableName = Mage::getResourceModel('catalog/product_flat')->getFlatTableName($storeId);
            $query = sprintf("
                SELECT
                    e . *,
                    at_price.value AS price,
                    cpf.price AS flat_price
                FROM
                    catalog_product_entity AS e
                        INNER JOIN
                    catalog_product_entity_decimal AS at_price ON (at_price.entity_id = e.entity_id)
                        AND (at_price.attribute_id = '64')
                        AND (at_price.store_id = %d)
                        INNER JOIN
                    %s AS cpf ON (cpf.entity_id = e.entity_id)
                WHERE at_price.value != cpf.price
                ORDER BY e.entity_id
            ", $storeId, $flatTableName);

            $result[$storeVal->getCode().':'.$storeId] = $connection->fetchAll($query);
        }

        return $result;
    }
}
