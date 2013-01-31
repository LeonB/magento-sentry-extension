# magento-sentry-extension

The `magento-sentry-extension` is a Magento 1.7 extension for Sentry interface.

This plugin is based on Raven client library [raven-php](https://github.com/getsentry/raven-php).

## Requirements

* PHP >= 5.2
* Magento >= 1.7
* Sentry instance

## Installation (via modman)

```bash
modman init
modman clone git@github.com:wearefarm/magento-sentry-extension.git
```

Open app/Mage.php and add in the following lines

```diff
             die();
         } catch (Exception $e) {
             if (self::isInstalled() || self::$_isDownloader) {
+                try {
+                    self::dispatchEvent('exception', array('exception' => $e));
+                } catch (Exception $ne) {
+                    self::printException($ne);
+                }
                 self::printException($e);
                 exit();
             }

```

### Configuration

In your Magento admin, go to System -> Configuration -> Advanced -> Developer -> Sentry.

Based upon [magento-amg-sentry-extension](https://github.com/amg-dev/magento-amg-sentry-extension).
