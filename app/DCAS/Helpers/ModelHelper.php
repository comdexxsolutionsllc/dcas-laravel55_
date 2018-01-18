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
    public static function generateUuid(): string
    {
        return Uuid::uuid4()->toString();
    }

    /**
     * @param Consumer $consumer
     *
     * @return string
     */
    public static function generateApiToken(Consumer $consumer): string
    {
        return hash_hmac('sha256', strtolower(trim($consumer->{$consumer->getKeyName()}.$consumer->{$consumer->getUpdatedAtColumn()})), config('app.key'));
    }
}
