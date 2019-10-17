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
        // Only apply BETWEEN clause, if missing OFFSET, otherwise use presto way to LIMIT records
        if (is_int($query->offset)) {
            // using custom BETWEENLIMIT clause only to detect if it is limit to prevent conflict with BETWEEN.
            // Handling it in Connection.php
            return 'BETWEENLIMIT '.(int) $limit;
        } else {
            return parent::compileLimit($query, $limit);
        }
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
