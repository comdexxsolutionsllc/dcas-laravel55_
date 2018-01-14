<?php

namespace DCAS\Helpers;

use App\Consumer;
use Ramsey\Uuid\Uuid;

class ModelHelper
{
    /**
     * Generates UUID4.
     *
     * @return string
     */
    public static function generateUuid()
    {
        return Uuid::uuid4()->toString();
    }

    /**
     * @param Consumer $consumer
     *
     * @return string
     */
    public static function generateApiToken(Consumer $consumer)
    {
        return hash_hmac('sha256', strtolower(trim($consumer->{$consumer->getKeyName()} . $consumer->{$consumer->getUpdatedAtColumn()})), config('app.key'));
    }
}
