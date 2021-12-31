<?php

/**
 * Social Share plugin for Craft CMS 3.x
 *
 * Social Share
 *
 * @link      https://www.dotsquares.com/
 * @copyright Copyright (c) 2021 Dotsquares
 */


namespace ds\facebook\variables;

use ds\facebook\Facebook;


use Craft;


class DsfacebookVariable

    // Public Methods
    // =========================================================================
     /**
     * Whatever you want to output to a Twig template can go into a Variable method.
     * You can have as many variable functions as you want.  From any Twig template,
     * call it like this:
     *
     *     {{ craft.dsfacebook.getSocial() }}
     *  */
{
    public function getSocial()
    {

      // return facebook::getInstance()->FacebookService->facebook();
    }

}
