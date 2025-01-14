<?php

namespace eloquentFilter\QueryFilter\Detection\ConditionsDetect\Eloquent;

use eloquentFilter\QueryFilter\Core\HelperFilter;
use eloquentFilter\QueryFilter\Detection\DetectorContract;
use eloquentFilter\QueryFilter\Queries\WhereIn;

/**
 * Class WhereInCondition.
 */
class WhereInCondition implements DetectorContract
{

    /**
     * @param $field
     * @param $params
     * @param $is_overide_method
     *
     * @return string|null
     */
    public static function detect($field, $params, $is_overide_method = false): ?string
    {
        if (is_array($params) && !HelperFilter::isAssoc($params) && !stripos($field, '.')) {
            $method = WhereIn::class;
        }

        return $method ?? null;
    }
}
