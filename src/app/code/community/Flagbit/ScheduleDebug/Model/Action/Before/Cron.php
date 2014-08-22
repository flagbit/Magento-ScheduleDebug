<?php
/**
 * Schedule debug action class
 *
 * @category    Flagbit
 * @package     Flagbit_ScheduleDebug
 */
class Flagbit_ScheduleDebug_Model_Action_Before_Cron extends Flagbit_ScheduleDebug_Model_Action_Abstract
{
    /**
     * Run action before cron
     *
     * @return Flagbit_ScheduleDebug_Model_Action_Before_Cron
     */
    public function execute()
    {
        // TODO Implement this
        //Mage::log('Flagbit Schedule Debugger before cron action ran!');
        return $this;
    }
}
