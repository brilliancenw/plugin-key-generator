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

use craft\helpers\Json;
use DateTime;
use DateTimeInterface;
use GuzzleHttp\Client;

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
     *     PluginKeyGenerator::$plugin->pluginKeyGeneratorService->generateKeyService($config)
     *
     * @return string
     */
    public function generateKeyService($config): string
    {
        $expiresOn = null;
        $expirable = false;

        $response = [];
        $response['success'] = false;
        $response['input'] = $config;
        // Check our Plugin's settings for `someAttribute`
        $apiKey = PluginKeyGenerator::$plugin->settings->getApiToken();
        $username = PluginKeyGenerator::$plugin->settings->getUsername();

        $response['apiKey'] = $apiKey;
        $response['username'] = $username;

        $client = new \GuzzleHttp\Client();
        if (isset($config['expirable']) && $config['expirable'] > 0 && isset($config['expiresOn']['date']) && $config['expiresOn']['date'] != "") {
            $datetime = new DateTime();
            $expiresOn = $datetime->createFromFormat('m/d/Y', $config['expiresOn']['date'])->format(DateTimeInterface::ATOM);
        }

        if (isset($config['expirable']) && $config['expirable'] > 0) {
            $expirable = true;
        }

        $response = $client->request(
            'POST',
            'https://api.craftcms.com/v1/plugin-licenses',
            [
                'auth' => [
                    $username,
                    $apiKey
                ],
                'json' => [
                    'edition' => $config['edition'],
                    'plugin' => $config['plugin'],
                    'email' => $config['email'],
                    'expirable' => $expirable,
                    'expiresOn' => $expiresOn,
                    'notes' => $config['notes'],
                    'privateNotes' => $config['privateNotes']
                ],
            ]
        );

        return $response->getBody()->getContents();

    }
}
