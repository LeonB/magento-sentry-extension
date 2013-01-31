<?php

require_once(Mage::getBaseDir() . DS . 'lib' . DS . 'Raven' . DS . 'Autoloader.php');
Raven_Autoloader::register();

class Farm_Sentry_Model_Client extends Raven_Client
{

    function __construct()
    {
        parent::__construct(Mage::getStoreConfig('dev/sentry/dsn'));
    }

}
