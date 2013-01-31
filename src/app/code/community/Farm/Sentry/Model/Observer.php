<?php

class Farm_Sentry_Model_Observer
{

    public function logException($observer)
    {
        if (!Mage::getStoreConfigFlag('dev/sentry/active')) {
            return true;
        }
        Mage::getSingleton('sentry/client')->captureException($observer['exception']);
        return $observer;
    }

}

