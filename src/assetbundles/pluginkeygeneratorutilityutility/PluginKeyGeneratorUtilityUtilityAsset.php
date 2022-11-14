<?php
/**
 * Plugin Key Generator plugin for Craft CMS 3.x
 *
 * Creates a utility for Craft CMS Plugin Developers to generate keys for their customers.  Simply a front-end for the API (https://docs.api.craftcms.com/plugin-licenses.html#create-a-plugin-license)
 *
 * @link      https://www.brilliancenw.com/
 * @copyright Copyright (c) 2022 Brilliance
 */

namespace brilliance\pluginkeygenerator\assetbundles\pluginkeygeneratorutilityutility;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * PluginKeyGeneratorUtilityUtilityAsset AssetBundle
 *
 * AssetBundle represents a collection of asset files, such as CSS, JS, images.
 *
 * Each asset bundle has a unique name that globally identifies it among all asset bundles used in an application.
 * The name is the [fully qualified class name](http://php.net/manual/en/language.namespaces.rules.php)
 * of the class representing it.
 *
 * An asset bundle can depend on other asset bundles. When registering an asset bundle
 * with a view, all its dependent asset bundles will be automatically registered.
 *
 * http://www.yiiframework.com/doc-2.0/guide-structure-assets.html
 *
 * @author    Brilliance
 * @package   PluginKeyGenerator
 * @since     3.0.0
 */
class PluginKeyGeneratorUtilityUtilityAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * Initializes the bundle.
     */
    public function init()
    {
        // define the path that your publishable resources live
        $this->sourcePath = "@brilliance/pluginkeygenerator/assetbundles/pluginkeygeneratorutilityutility/dist";

        // define the dependencies
        $this->depends = [
            CpAsset::class,
        ];

        // define the relative path to CSS/JS files that should be registered with the page
        // when this asset bundle is registered
        $this->js = [
            'js/PluginKeyGeneratorUtility.js',
        ];

        $this->css = [
            'css/PluginKeyGeneratorUtility.css',
        ];

        parent::init();
    }
}
