<?php

/**
 * Facebook Feed plugin for Craft CMS 3.x
 *
 * Get Posts from Your Facebook Page
 *
 * @link      https://dotsquares.com
 * @copyright Copyright (c) 2021 dotsquares
 */

namespace ds\facebook;

use Craft;
use craft\base\Plugin;
use ds\facebook\models\Settings;
use ds\facebook\services\FacebookService;
use craft\web\twig\variables\CraftVariable;
use ds\facebook\variables\Facebooktest;
use yii\base\Event;



/**
 * Craft plugins are very much like little applications in and of themselves. We’ve made
 * it as simple as we can, but the training wheels are off. A little prior knowledge is
 * going to be required to write a plugin.
 *
 * For the purposes of the plugin docs, we’re going to assume that you know PHP and SQL,
 * as well as some semi-advanced concepts like object-oriented programming and PHP namespaces.
 *
 * https://docs.craftcms.com/v3/extend/
 *
 * @author    dotsquares
 * @package   FacebookFeed
 * @since     1.0.0
 *
 * @property  FacebookFeedServiceService $facebookFeedService
 * @property  Settings $settings
 * @method    Settings getSettings()
 */
class Facebook extends Plugin 

{
    
    /**
     * To execute your plugin’s migrations, you’ll need to increase its schema version.
     *
     * @var string
     */
    public $schemaVersion = '1.0.0';

    /**
     * Set to `true` if the plugin should have a settings view in the control panel.
     *
     * @var bool
     */

    public $hasCpSettings = true;
	public static $plugin;
    
    // Public Methods
    // =========================================================================

    /**
     * Set our $plugin static property to this class so that it can be accessed via
     * FacebookFeed::$plugin
     *
     * Called after the plugin class is instantiated; do any one-time initialization
     * here such as hooks and events.
     *
     * If you have a '/vendor/autoload.php' file, it will be loaded for you automatically;
     * you do not need to load it in your init() method.
     *
     */

    public function init()
    {
        parent::init();
         self::$plugin = $this;
        

         parent::init();
         self::$plugin = $this;
         $this->setComponents([
             'FacebookService' =>  services\FacebookService::class,
         ]);
         
         // Register our variables
         Event::on(
             CraftVariable::class,
             CraftVariable::EVENT_INIT,
             function (Event $event) {
                 /** @var CraftVariable $variable */
                 $variable = $event->sender;
                 $variable->set('dsfacebook', variables\FacebooktestVariable::class);
             }
         );


/**
 * Logging in Craft involves using one of the following methods:
 *
 * Craft::trace(): record a message to trace how a piece of code runs. This is mainly for development use.
 * Craft::info(): record a message that conveys some useful information.
 * Craft::warning(): record a warning message that indicates something unexpected has happened.
 * Craft::error(): record a fatal error that should be investigated as soon as possible.
 *
 * Unless `devMode` is on, only Craft::warning() & Craft::error() will log to `craft/storage/logs/web.log`
 *
 * It's recommended that you pass in the magic constant `__METHOD__` as the second parameter, which sets
 * the category to the method (prefixed with the fully qualified class name) where the constant appears.
 *
 * To enable the Yii debug toolbar, go to your user account in the AdminCP and check the
 * [] Show the debug toolbar on the front end & [] Show the debug toolbar on the Control Panel
 *
 * http://www.yiiframework.com/doc-2.0/guide-runtime-logging.html
 */
        Craft::info(
            Craft::t(
                'dsfacebook',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    
   // Protected Methods
    // =========================================================================

    /**
     * Creates and returns the model used to store the plugin’s settings.
     *
     * @return \craft\base\Model|null
     */
        protected function createSettingsModel()
        {
            return new Settings();
        }
    
    
         
    /**
     * Returns the rendered settings HTML, which will be inserted into the content
     * block on the settings page.
     *
     * @return string The rendered settings HTML
     */
    
        protected function settingsHtml()
        {
            return \Craft::$app->getView()->renderTemplate(
                // Plugin handle name/settings
                'dsfacebook/settings',
                [ 'settings' => $this->getSettings() ]
            );
            

            

        } 
       
       

    





}
