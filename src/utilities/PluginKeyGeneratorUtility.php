<?php
/**
 * Plugin Key Generator plugin for Craft CMS 3.x
 *
 * Creates a utility for Craft CMS Plugin Developers to generate keys for their customers.  Simply a front-end for the API (https://docs.api.craftcms.com/plugin-licenses.html#create-a-plugin-license)
 *
 * @link      https://www.brilliancenw.com/
 * @copyright Copyright (c) 2022 Brilliance
 */

namespace brilliance\pluginkeygenerator\utilities;

use brilliance\pluginkeygenerator\PluginKeyGenerator;
use brilliance\pluginkeygenerator\assetbundles\pluginkeygeneratorutilityutility\PluginKeyGeneratorUtilityUtilityAsset;

use Craft;
use craft\base\Utility;

/**
 * Plugin Key Generator Utility
 *
 * Utility is the base class for classes representing Control Panel utilities.
 *
 * https://craftcms.com/docs/plugins/utilities
 *
 * @author    Brilliance
 * @package   PluginKeyGenerator
 * @since     3.0.0
 */
class PluginKeyGeneratorUtility extends Utility
{
    // Static
    // =========================================================================

    /**
     * Returns the display name of this utility.
     *
     * @return string The display name of this utility.
     */
    public static function displayName(): string
    {
        return Craft::t('plugin-key-generator', 'PluginKeyGeneratorUtility');
    }

    /**
     * Returns the utility’s unique identifier.
     *
     * The ID should be in `kebab-case`, as it will be visible in the URL (`admin/utilities/the-handle`).
     *
     * @return string
     */
    public static function id(): string
    {
        return 'pluginkeygenerator-plugin-key-generator-utility';
    }

    /**
     * Returns the path to the utility's SVG icon.
     *
     * @return string|null The path to the utility SVG icon
     */
    public static function iconPath()
    {
        return Craft::getAlias("@brilliance/pluginkeygenerator/assetbundles/pluginkeygeneratorutilityutility/dist/img/PluginKeyGeneratorUtility-icon.svg");
    }

    /**
     * Returns the number that should be shown in the utility’s nav item badge.
     *
     * If `0` is returned, no badge will be shown
     *
     * @return int
     */
    public static function badgeCount(): int
    {
        return 0;
    }

    /**
     * Returns the utility's content HTML.
     *
     * @return string
     */
    public static function contentHtml(): string
    {
        Craft::$app->getView()->registerAssetBundle(PluginKeyGeneratorUtilityUtilityAsset::class);

        $someVar = 'Have a nice day!';
        return Craft::$app->getView()->renderTemplate(
            'plugin-key-generator/_components/utilities/PluginKeyGeneratorUtility_content',
            [
                'someVar' => $someVar
            ]
        );
    }
}
