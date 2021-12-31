<?php

/**
 * Facebook Feed plugin for Craft CMS 3.x
 *
 * Get Posts from Your Facebook Page
 *
 * @link      https://dotsquares.com
 * @copyright Copyright (c) 2021 dotsquares
 */

namespace ds\facebook\variables;

use ds\facebook\Facebook;


use Craft;

/**
 * Facebook Feed Variable
 *
 * Craft allows plugins to provide their own template variables, accessible from
 * the {{ craft }} global variable (e.g. {{ craft.facebook}}).
 *
 * https://craftcms.com/docs/plugins/variables
 *
 * @author    dotsquares
 * @package   FacebookFeed
 * @since     1.0.0
 */
class FacebooktestVariable

/**
 * Whatever you want to output to a Twig template can go into a Variable method.
 * You can have as many variable functions as you want.  From any Twig template,
 * call it like this:
 *
 *     {{ craft.facebook.exampleVariable }}
 *
 * Or, if your variable requires parameters from Twig:
 *
 *     {{ craft.facebook.exampleVariable(twigValue) }}
 *
 * @param null $optional
 * @return string
 */
{
    public function getslides()
    {

        return Facebook::getInstance()->FacebookService->facebookfeed();
    }
}
