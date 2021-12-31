<?php

/**
 * Facebook Feed plugin for Craft CMS 3.x
 *
 * Get Posts from Your Facebook Page
 *
 * @link      https://dotsquares.com
 * @copyright Copyright (c) 2021 dotsquares
 */


namespace ds\facebook\models;

use ds\facebook\Facebook;


use Craft;
use craft\base\Model;


/**
 * FacebookFeed Settings Model
 *
 * This is a model used to define the plugin's settings.
 *
 * Models are containers for data. Just about every time information is passed
 * between services, controllers, and templates in Craft, it’s passed via a model.
 *
 * https://craftcms.com/docs/plugins/models
 *
 * @author    dotsquares
 * @package   FacebookFeed
 * @since     1.0.0
 */


class Settings extends Model
{
    // Public Properties
    // =========================================================================
    // =========================================================================

    public $facebookUser = '';
    public $facebookfeedtitle = '';
    public $facebook_page_id = '';
    public $Slider = '';
    public $Fbpage = '';
    public $profile = '';
    public $Time = '';
    public $Caption = '';



    /**
     * Returns the validation rules for attributes.
     *
     * Validation rules are used by [[validate()]] to check if attribute values are valid.
     * Child classes may override this method to declare different validation rules.
     *
     * More info: http://www.yiiframework.com/doc-2.0/guide-input-validation.html
     *
     * @return array
     */



    public function rules()
    {
        return [
            [['facebookUser'], 'required'],
            [['facebook_page_id'], 'required'],
            [['facebook_page_id'], 'number'],


        ];
    }



    public function getAccount()
    {
        return Craft::parseEnv(trim(Facebook::getInstance()->getSettings()->facebookUser));
    }

    public function getFacebookpage()
    {
        return Craft::parseEnv(trim(Facebook::getInstance()->getSettings()->facebook_page_id));
    }
    public function gettitle()
    {
        return Craft::parseEnv(trim(Facebook::getInstance()->getSettings()->facebookfeedtitle));
    }
    public function getslider()
    {
        return Craft::parseEnv(trim(Facebook::getInstance()->getSettings()->Slider));
    }
    public function getpage()
    {
        return Craft::parseEnv(trim(Facebook::getInstance()->getSettings()->Fbpage));
    }
    public function getprofile()
    {
        return Craft::parseEnv(trim(Facebook::getInstance()->getSettings()->profile));
    }
    public function getTime()
    {
        return Craft::parseEnv(trim(Facebook::getInstance()->getSettings()->Time));
    }
    public function getCaption()
    {
        return Craft::parseEnv(trim(Facebook::getInstance()->getSettings()->Caption));
    }
}
