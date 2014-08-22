<?php
/**
 * Abstract.php
 *
 * @category   Flagbit
 * @package
 * @copyright  Copyright (c) 22.08.2014 Flagbit GmbH & Co. KG
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */
class Flagbit_ScheduleDebug_Model_Action_Abstract implements Flagbit_ScheduleDebug_Model_Action_Interface {

    /**
     * Connection instance
     *
     * @var Varien_Db_Adapter_Interface
     */
    protected $_connection;

    /**
     * Observer with data from Aoe_Scheduler event data
     * @var Varien_Event_Observer
     */
    protected $_observer;

    /**
     * Constructor with parameters
     * Array of arguments with keys
     *  - 'connection' Varien_Db_Adapter_Interface
     *
     * @param array $args
     */
    public function __construct(array $args)
    {
        $this->_setConnection($args['connection']);
        $this->_setObserver($args['observer']);
    }

    /**
     * Execute schedule debugger operation
     *
     * @return Flagbit_ScheduleDebug_Model_Action_Interface
     */
    public function execute()
    {
        // TODO override this on subclasses
        return;
    }

    /**
     * Set connection instance
     *
     * @param Varien_Db_Adapter_Interface $connection
     * @return Flagbit_ScheduleDebug_Model_Action_Before_Cron
     */
    protected function _setConnection(Varien_Db_Adapter_Interface $connection)
    {
        $this->_connection  = $connection;
        return $this;
    }

    /**
     * Set observer data
     *
     * @param Varien_Event_Observer $observer
     * @return Flagbit_ScheduleDebug_Model_Action_Before_Cron
     */
    protected function _setObserver(Varien_Event_Observer $observer)
    {
        $this->_observer  = $observer;
        return $this;
    }
}
