<?php

namespace eloquentFilter\QueryFilter\Detection\ConditionsDetect\Eloquent;

use eloquentFilter\QueryFilter\Detection\DetectorContract;
use eloquentFilter\QueryFilter\Queries\Special;

/**
 * Class SpecialCondition.
 */
class SpecialCondition implements DetectorContract
{
    /**
     * @param $field
     * @param $params
     * @param bool $is_override_method
     *
     * @return string|null
     */
    public static function detect($field, $params, $is_override_method = false): ?string
    {
        if ($field == 'f_params') {
            return Special::class;
        }

        return null;
    }
}
