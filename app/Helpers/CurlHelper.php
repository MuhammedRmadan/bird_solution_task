<?php

namespace App\Helpers;



class CurlHelper
{
    /**
     * send API request to rereive user data from github
     *
     * @param  $user : github user name of the sender
     * @param  $pwd : github password of the sender
     * @param  $url : github password of the sender
     * @return $result : response of the API
     */
    public static function curlSendRequest($user, $pwd,$url)
    {
        $cInit = curl_init();
        curl_setopt($cInit, CURLOPT_URL, $url);
        curl_setopt($cInit, CURLOPT_RETURNTRANSFER, 1); // 1 = TRUE
        curl_setopt($cInit, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($cInit, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($cInit, CURLOPT_USERPWD, $user . ':' . $pwd);

        $output = curl_exec($cInit);

        $info = curl_getinfo($cInit, CURLINFO_HTTP_CODE);
        $result = json_decode($output);

        curl_close($cInit);
        return $result;
    }


}
