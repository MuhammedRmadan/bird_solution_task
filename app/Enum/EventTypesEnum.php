<?php

/**
 * Created by PhpStorm.
 * User: rami
 * Date: 2/7/19
 * Time: 8:19 PM
 */

namespace App\Enum;

abstract class EventTypesEnum
{
    public static $PushEvent = 10;
    public static $PullRequestEvent = 5;
    public static $IssueCommentEvent = 4;

    public static function getRequestedEventsArray()
    {
        return [
            'PushEvent', 'PullRequestEvent', 'IssueCommentEvent'
        ];
    }

}
