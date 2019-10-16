<?php
namespace Bilaliqbalr\Athena\Query;

use Illuminate\Database\Query\Grammars\MySqlGrammar;
use Illuminate\Database\Query\Builder;

class Grammar extends MySqlGrammar
{
    /**
     * Compile the "limit" portions of the query.
     *
     * @param  Builder  $query
     * @param  int  $limit
     * @return string
     */
    protected function compileLimit(Builder $query, $limit)
    {
        return 'BETWEEN '.(int) $limit;
    }

    /**
     * Compile the "offset" portions of the query.
     *
     * @param  \Illuminate\Database\Query\Builder  $query
     * @param  int  $offset
     * @return string
     */
    protected function compileOffset(Builder $query, $offset)
    {
        return 'AND '.(int) $offset;
    }
}
