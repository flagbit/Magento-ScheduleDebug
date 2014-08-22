<?php
/**
 * Interface.php
 *
 * @category   Flagbit
 * @package
 * @copyright  Copyright (c) 22.08.2014 Flagbit GmbH & Co. KG
 * @license    http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */
interface Flagbit_ScheduleDebug_Model_Action_Interface
{
    /**
     * Execute schedule debugger operation
     *
     * @abstract
     * @return Flagbit_ScheduleDebug_Model_Action_Interface
     */
    public function execute();
}
