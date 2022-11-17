# Plugin Key Generator plugin for Craft CMS 3 or 4

Creates a utility for Craft CMS Plugin Developers to generate keys for their customers.  Simply a front-end for the API (https://docs.api.craftcms.com/plugin-licenses.html#create-a-plugin-license). Of course, this can only generate Licenses for those plugins you manage in your account.

## Requirements

This plugin requires Craft CMS 3 or 4.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require brilliancenw/plugin-key-generator

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Plugin Key Generator.

## Plugin Key Generator Overview

This utility only requires you to set it up once, then it allows a Plugin Developer to generate keys for their customers. This may be for testing, free licenses to non-profit organizations, beta tests or whatever.  Full support for expiration dates or those that never expire.

## Configuring Plugin Key Generator

After installed, visit the plugin settings to add your Craft Console Username and API key.  These can be found in the Craft Console Profile: https://console.craftcms.com/settings/profile.

You can easily pre-configure to populate your plugin handles and editions without having to type them every time.  Simply enter the plugin handles and edition handles as a comma-separated values list.

## Using Plugin Key Generator

In the Admin Panel, go to Utilities and "Plugin Key Generator".  Enter the Plugin Handle, The Edition Handle and the Licensee Email Address.  Other options for expiration and notes are available.

## Plugin Key Generator Roadmap

Some things to do, and ideas for potential features:

* let us know if you have feature requests

Brought to you by [Brilliance](https://www.brilliancenw.com/)
