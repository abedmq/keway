<?php

namespace App\Notifications;

trait NotificationUtilities
{
    function prepareDataFcm($data=null)
    {
        $newData = [];
        foreach ($data as $key => $item) {
            if (is_array($item)) {
                foreach ($item as $k => $v) {
                    $newData[$k] = $v;
                }
            } else {
                $newData[$key] = $item."";
            }
        }
        return $newData;
    }
}
