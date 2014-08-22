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
        $result = Mage::helper('flagbit_scheduledebug')
            ->getPriceDifferencesResultSet($this->_connection);

        $schedule = $this->_observer->getData('schedule');

        foreach($result as $store => $res) {
            if(($diffs = count($res)) > 0) {
                /** @var Aoe_Scheduler_Model_Schedule $schedule */
                Mage::log(
                    sprintf('AFTER: %s there was %d price differences on: %s',
                        $schedule->getJobCode(), count($result), $store),
                    null,
                    'cron.log'
                );
            }
        }

        return $this;
    }
}
