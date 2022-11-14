<?php
/**
 * Plugin Key Generator plugin for Craft CMS 3.x
 *
 * Creates a utility for Craft CMS Plugin Developers to generate keys for their customers.  Simply a front-end for the API (https://docs.api.craftcms.com/plugin-licenses.html#create-a-plugin-license)
 *
 * @link      https://www.brilliancenw.com/
 * @copyright Copyright (c) 2022 Brilliance
 */

namespace brilliance\pluginkeygenerator\services;

use brilliance\pluginkeygenerator\PluginKeyGenerator;

use Craft;
use craft\base\Component;

/**
 * PluginKeyGeneratorService Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    Brilliance
 * @package   PluginKeyGenerator
 * @since     3.0.0
 */
class PluginKeyGeneratorService extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * This function can literally be anything you want, and you can have as many service
     * functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     PluginKeyGenerator::$plugin->pluginKeyGeneratorService->exampleService()
     *
     * @return mixed
     */
    public function exampleService()
    {
        $result = 'something';
        // Check our Plugin's settings for `someAttribute`
        if (PluginKeyGenerator::$plugin->getSettings()->someAttribute) {
        }

        return $result;
    }
}
