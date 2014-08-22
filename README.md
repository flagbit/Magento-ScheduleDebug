Flagbit ScheduleDebug
=====================

This is a module for do some debugging into cron tasks scheduled and executed by
[AOE Scheduler for Magento](http://www.fabrizio-branca.de/magento-cron-scheduler.html). Basically it listens for
the `cron_before` and `cron_after*` events from  [AOE Scheduler for Magento](http://www.fabrizio-branca.de/magento-cron-scheduler.html)
and execute configured actions.

Actions can be specified on config.xml as coma separated values.
