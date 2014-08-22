<?php
/**
 * Schedule debug action class
 *
 * @category    Flagbit
 * @package     Flagbit_ScheduleDebug
 */
class Flagbit_ScheduleDebug_Model_Action_After_Cron extends Flagbit_ScheduleDebug_Model_Action_Abstract
{
    /**
     * Run action after cron
     *
     * @return Flagbit_ScheduleDebug_Model_Action_After_Cron
     */
    public function execute()
    {
        // TODO Implement this
        //Mage::log('Flagbit Schedule Debugger after cron action ran!');
        return $this;
    }
}
