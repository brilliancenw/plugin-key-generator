<?php
/**
 * Plugin Key Generator plugin for Craft CMS 3.x
 *
 * Creates a utility for Craft CMS Plugin Developers to generate keys for their customers.  Simply a front-end for the API (https://docs.api.craftcms.com/plugin-licenses.html#create-a-plugin-license)
 *
 * @link      https://www.brilliancenw.com/
 * @copyright Copyright (c) 2022 Brilliance
 */

namespace brilliance\pluginkeygenerator\controllers;

use brilliance\pluginkeygenerator\PluginKeyGenerator;

use Craft;
use craft\web\Controller;

/**
 * Default Controller
 *
 * Generally speaking, controllers are the middlemen between the front end of
 * the CP/website and your plugin’s services. They contain action methods which
 * handle individual tasks.
 *
 * A common pattern used throughout Craft involves a controller action gathering
 * post data, saving it on a model, passing the model off to a service, and then
 * responding to the request appropriately depending on the service method’s response.
 *
 * Action methods begin with the prefix “action”, followed by a description of what
 * the method does (for example, actionSaveIngredient()).
 *
 * https://craftcms.com/docs/plugins/controllers
 *
 * @author    Brilliance
 * @package   PluginKeyGenerator
 * @since     3.0.0
 */
class DefaultController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected int|bool|array $allowAnonymous = [];

    // Public Methods
    // =========================================================================

    /**
     * Handle a request going to our plugin's actionDoSomething URL,
     * e.g.: actions/plugin-key-generator/default/do-something
     *
     * @return mixed
     */
    public function actionGenerateKey()
    {
        $inputVariables = Craft::$app->request->getBodyParams();

        $response = PluginKeyGenerator::$plugin->pluginKeyGeneratorService->generateKeyService($inputVariables);

        header('Content-Type: application/json');
        print $response;
        exit;
    }
}
