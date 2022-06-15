<?php

namespace Tests\Models;

use eloquentFilter\QueryFilter\ModelFilters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Tests\Models\CustomDetect\WhereRelationLikeCondition;
use Tests\Models\Filters\usersFilter;
use Tests\Tests\Category;

/**
 * Class User.
 */
class User extends Model
{
    use Filterable;

    /**
     * @var array
     */
    private static $whiteListFilter = [
        'baz',
        'too',
        'count_posts',
        'foo.bam',
        'foo.created_at',
        'foo.baz.bam',
        'created_at',
        'email',
    ];

    public function foo()
    {
        return $this->belongsTo(Category::class);
    }

    public function address()
    {
        return $this->belongsTo(Category::class, 'foo_id');
    }

    public function activeFoo()
    {
        return $this->belongsTo(Category::class, 'foo_id')->where('active', true);
    }

    public function EloquentFilterCustomDetection(): array
    {
        return [
            WhereRelationLikeCondition::class,
        ];
    }
}
