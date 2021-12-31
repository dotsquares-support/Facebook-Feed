<?php

/**
 * Facebook Feed plugin for Craft CMS 3.x
 *
 * Facebook Feed
 * 
 * @link      https://www.dotsquares.com/
 * @copyright Copyright (c) 2021 Dotsquares
 */


namespace ds\facebook\services;

use Craft;
use craft\base\Component;
use ds\facebook\Facebook;
use ds\facebook\resources\FacebookAsset;


/**
 * Facebook Feed Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    dotsquares
 * @package   FacebookFeed
 * @since     1.0.0
 */


class FacebookService extends  Component

{
    // Public Methods
    // =========================================================================

    /**
     * This function can literally be anything you want, and you can have as many service
     * functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     Facebook::$plugin->facebookService->exampleService()
     *
     * @return mixed
     */

    public function facebookfeed($accountOrTag = null, $gettitle = null)
    {
        $view = Craft::$app->getView();
        $view->registerAssetBundle(FacebookAsset::class);
        $settings = Facebook::getInstance()->getSettings();
        $accountOrTag = $settings->getAccount();
        $pageid = $settings->getFacebookpage();
        $Title = $settings->gettitle();
        $Slider = $settings->getSlider();
        $Fbpage = $settings->getpage();

        $Profile = $settings->getprofile();
        $Time = $settings->getTime();
        $Caption = $settings->getCaption();








        if (empty($accountOrTag)) {
            Craft::warning('No Access Token configured.', __METHOD__);

            return [];
        }

        Craft::debug('Get feed for "' . $accountOrTag . '"', __METHOD__);




        $limit = 15;
        $counter = 1;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/$pageid?fields=posts.limit($limit)%7Bfull_picture%2Cmessage%2Ccreated_time%7D%2Cname%2Cpicture&access_token=$accountOrTag");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        $results = json_decode($result, true);
        if (isset($results['error']['message'])) {
          $Error = $results['error']['message'];
        }


        if (!empty($Error)) {
            echo '<h2>Error : ' . $Error . '</h2>';
        } else {
            if (empty($Title)) {
                $Title = 'Facebook Feed';
            }
            $count = "";
            if ($Fbpage == 0) {
                $name = isset($results["name"]) ? $results["name"] : "";
            } else {
                $name = "";
            }

            if ($Profile == 0) {
                $picture = $results["picture"]["data"]["url"];
            } else {
                $picture = "";
            }
          
            echo "<script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js' integrity='sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB' crossorigin='anonymous'></script>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
        <link rel='stylesheet' href='https://pro.fontawesome.com/releases/v5.10.0/css/all.css' integrity='sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p' crossorigin='anonymous'/>
";
            if ($Slider == 0 || $Slider == "") {

                echo "<div class='container mt-5 mb-5'>
        <h3 class='feed-title mb-4'>$Title</h3>

        <div class='masonrycss' >
        
          ";
            } else {
                echo "<div class='container mt-5 mb-5'>
    <h3 class='feed-title mb-4'>$Title</h3>

        <div id='news-slider' class=' owl-carousel'>";
            }




            foreach ($results  as $list) {
                if (is_array($list) || is_object($list))

                    foreach ($list as $lists) {

                        if (is_array($lists) || is_object($lists))

                            foreach ($lists as $finals) {

                                $created_time = isset($finals["created_time"]) ? $finals["created_time"] : "";
                                $created_time_arr = explode('T', $created_time);
                                $created_time_index = $created_time_arr[0];
                                $final_time =   date("d-m-Y", strtotime($created_time_index));
                                $message = isset($finals["message"]) ? $finals["message"] : "";
                                $full_picture = isset($finals["full_picture"]) ? $finals["full_picture"] : "";

                                if ($full_picture != "" && $Slider == 0) {
                                    echo "
                    <div class='block'>
                    <div class='card'>
                        <div class='d-flex justify-content-between p-2 px-3'>
                            <div class='d-flex flex-row align-items-center'> ";
                                    if ($Profile == 0) {
                                        echo " <a href='https://facebook.com/$pageid'>
                            <img src=$picture width='50' class='rounded-circle'></a>";
                                    }
                                    echo "
                                <div class='d-flex flex-column ml-2'> <span class='font-weight-bold'><a href='https://facebook.com/$pageid'>$name</a></span>
                                ";
                                    if ($Time == 0) {
                                        echo "<div class='d-flex flex-row mt-1 ellipsis'> 
                        <small class='mr-2'>$final_time</small> <i class='fa fa-ellipsis-h'></i>
                         </div>";
                                    }
                                    echo "</div> </div>
                           
                                    
                                    
                        </div> ";
                                    if ($full_picture !== "VIDEO") {

                                        echo " <a href='https://facebook.com/$pageid'><img src=$full_picture class='img-fluid'></a>";
                                    }
                                    if ($Caption == 0) {
                                        echo "    <div class='p-3'>
                            <p class='text-justify'>$message</p>
                           
                          
                        </div>
                        ";
                                    }
                                    echo "
                    </div>
                </div>";
                                } else {
                                    if ($full_picture != "" && $Slider == 1) {


                                        echo "
                                <div class='card'>
                    <div class='card'>
                        <div class='d-flex justify-content-between p-2 px-3'>
                            <div class='d-flex flex-row align-items-center'> ";
                                        if ($Profile == 0) {
                                            echo " <a href='https://facebook.com/$pageid'>
                            <img src=$picture width='50' class='rounded-circle'></a>";
                                        }
                                        echo "
                                <div class='d-flex flex-column ml-2'> <span class='font-weight-bold'><a href='https://facebook.com/$pageid'>$name</a></span> </div>
                            </div>";
                                        if ($Time == 0) {
                                            echo "<div class='d-flex flex-row mt-1 ellipsis'> 
                            <small class='mr-2'>$final_time</small> <i class='fa fa-ellipsis-h'></i>
                             </div>";
                                        }
                                        echo "
                        </div> <a href='https://facebook.com/$pageid'><img src=$full_picture class='img-fluid'></a>";
                                        if ($Caption == 0) {
                                            echo "    <div class='p-3'>
                            <p class='text-justify'>$message</p>
                          
                          
                        </div>
                        ";
                                        }
                                        echo "
                    </div>
                </div>
                            ";
                                    }
                                }

                               // echo $counter;
                                $counter++;
                            }
                    }
                echo "</div>
            </div>
                    ";
                   

            }
        }
    }
}
