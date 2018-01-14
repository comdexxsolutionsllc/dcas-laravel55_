<?php

namespace DCAS\Observers;

use App\Consumer;
use DCAS\Helpers\ModelHelper;

/**
 * Class ConsumerObserver.
 */
class ConsumerModelObserver
{
    /**
     * @param Consumer $model
     */
    public function created(Consumer $model)
    {
        $model->{$model->getApiTokenKey()} = ModelHelper::generateApiToken($model);

        return null;
    }
}
