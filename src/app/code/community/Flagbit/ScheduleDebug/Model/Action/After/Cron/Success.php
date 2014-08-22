<?php
/**
 * Schedule debug action class
 *
 * @category    Flagbit
 * @package     Flagbit_ScheduleDebug
 */
class Flagbit_ScheduleDebug_Model_Action_After_Cron_Success extends Flagbit_ScheduleDebug_Model_Action_Abstract
{
    /**
     * Run action after success cron
     *
     * @return Flagbit_ScheduleDebug_Model_Action_After_Cron_Success
     */
    public function execute()
    {
        // TODO Implement this
        //Mage::log('Flagbit Schedule Debugger after cron success action ran!');
        return $this;
    }
}
