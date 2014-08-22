<?php
/**
 * Schedule debug action class
 *
 * @category    Flagbit
 * @package     Flagbit_ScheduleDebug
 */
class Flagbit_ScheduleDebug_Model_Action_After_Cron_Error extends Flagbit_ScheduleDebug_Model_Action_Abstract
{
    /**
     * Run action after error cron
     *
     * @return Flagbit_ScheduleDebug_Model_Action_After_Cron_Error
     */
    public function execute()
    {
        // TODO Implement this
        //Mage::log('Flagbit Schedule Debugger after cron error action ran!');
        return $this;
    }
}
