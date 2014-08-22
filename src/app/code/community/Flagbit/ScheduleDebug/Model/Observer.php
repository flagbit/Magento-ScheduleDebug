<?php
/**
 * Observer.php
 *
 * @category   Flagbit
 * @package
 * @copyright  Copyright (c) 22.08.2014 Flagbit GmbH & Co. KG
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class Flagbit_ScheduleDebug_Model_Observer extends Mage_Core_Model_Abstract {

    /**
     * Default adapter instance
     *
     * @var Varien_Db_Adapter_Interface
     */
    protected $_defaultConnection;

    /**
     * Observer method to run actions configured on "cron_before" event fired by Aoe_Scheduler
     *
     * @param Varien_Event_Observer $observer
     */
    public function runActionsBeforeCron($observer) {

        foreach ($this->_getActions('cron_before') as $action) {
            $this->_execute($action, array('observer' => $observer));
        }
    }

    /**
     * Observer method to run actions configured on "cron_after" event fired by Aoe_Scheduler
     *
     * * @param Varien_Event_Observer $observer
     */
    public function runActionsAfterCron($observer) {

        foreach ($this->_getActions('cron_after') as $action) {
            $this->_execute($action, array('observer' => $observer));
        }
    }

    /**
     * Observer method to run actions configured on "cron_after_error" event fired by Aoe_Scheduler
     *
     * * @param Varien_Event_Observer $observer
     */
    public function runActionsAfterCronError($observer) {

        foreach ($this->_getActions('cron_after_error') as $action) {
            $this->_execute($action, array('observer' => $observer));
        }
    }

    /**
     * Observer method to run actions configured on "cron_after_success" event fired by Aoe_Scheduler
     *
     * * @param Varien_Event_Observer $observer
     */
    public function runActionsAfterCronSuccess($observer) {

        foreach ($this->_getActions('cron_after_success') as $action) {
            $this->_execute($action, array('observer' => $observer));
        }
    }

    /**
     * Retrieve default connection
     *
     * @return Varien_Db_Adapter_Interface
     */
    protected function _getDefaultConnection()
    {
        if (null === $this->_defaultConnection) {
            $this->_defaultConnection = Mage::getSingleton('core/resource')
                ->getConnection(Mage_Core_Model_Resource::DEFAULT_WRITE_RESOURCE);
        }
        return $this->_defaultConnection;
    }

    /**
     * Execute action
     *
     * @param string $classPath
     * @param array $args
     * @throws Exception
     * @return Flagbit_ScheduleDebug_Model_Action_Interface
     */
    protected function _execute($classPath, array $args = array())
    {
        if (empty($classPath)) {
            throw new Exception('Classpath should not be empty');
        }

        $args += array('connection' => $this->_getDefaultConnection());

        if(!$action = Mage::getModel($classPath, $args)) {
            throw new Exception('Invalid classpath value, could not instantiate model from it.');
        }

        if (!$action instanceof Flagbit_ScheduleDebug_Model_Action_Interface) {
            throw new Exception('Action "' . get_class($action) . '" must be an instance of ' .
                'Flagbit_ScheduleDebug_Model_Action_Interface');
        }

        $action->execute();

        return $action;
    }

    /**
     * Take a coma separated string from configuration
     *
     * @param string $event Event type actions
     * @return array Actions to execute for the Aoe_Scheduler event
     */
    protected function _getActions($event){
        $actions = Mage::getConfig()->getNode('default/flagbit_scheduledebug/'.$event.'_actions');
        return explode(',', $actions);
    }
}
