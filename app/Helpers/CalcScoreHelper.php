<?php

namespace App\Helpers;


use App\Enum\EventTypesEnum;

class CalcScoreHelper
{
    /**
     * send API request to rereive user data from github
     *
     * @param  $result : github response that contains repo info
     * @return $score : user score points
     */
    public static function calcUserScore($result)
    {
        $score = 0;
        $totalRepoData = [];
        foreach ($result as $key => $event) {
            $points = 1;
            if (in_array($event->type, EventTypesEnum::getRequestedEventsArray())) {
                $points = EventTypesEnum::${$event->type};
            }
            $currentRepoData = [
                'type' => $event->type,
                'repository' => $event->repo->name,
                'date' => $event->created_at,
                'points' => $points,
            ];
            $totalRepoData[] = $currentRepoData;
            $score += $points;
        }
        return [
            'data' => $totalRepoData,
            'score' => $score
        ];
    }


}
