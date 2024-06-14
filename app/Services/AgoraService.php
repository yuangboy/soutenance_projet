<?php

namespace App\Services;

require_once app_path('Agora/RtcTokenBuilderSample.php');

use DateTime;
use DateTimeZone;

class AgoraService
{
    public static function createToken($appId, $appCertificate, $channelName, $uid = 0, $role = \RtcTokenBuilderSample::RoleAttendee, $expireTimeInSeconds = 3600)
    {
        if (empty($appId) || empty($appCertificate)) {
            throw new \Exception('Need to set environment variable AGORA_APP_ID and AGORA_APP_CERTIFICATE');
        }

        $currentTimestamp = (new DateTime("now", new DateTimeZone('UTC')))->getTimestamp();
        $privilegeExpiredTs = $currentTimestamp + $expireTimeInSeconds;

        // Générer le token avec uid
        $token = \RtcTokenBuilderSample::buildTokenWithUid($appId, $appCertificate, $channelName, $uid, $role, $privilegeExpiredTs);
        return $token;
    }
}