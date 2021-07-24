<?php

namespace BuilderToSql\Helper;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class BuilderToSql
{
    /**
     * Render Eloquent or Query builder to Sql
     *
     * @param EloquentBuilder|QueryBuilder $builder
     * @param bool $withBackQuote
     * @return string
     */
    public static function render($builder, bool $withBackQuote = false): string
    {
        // check if query contains `?`
        if (strpos($builder->toSql(), '?') !== false) {
            // Find all letters with modulo & add another modulo in able to ignore it from `vsprintf`
            $stringWithModulo = preg_replace_callback('/%/', function ($match) {
                return current(array_map(function ($m) {
                    return "%{$m}";
                }, $match));
            }, $builder->toSql());

            $sql = str_replace(['?'], ['\'%s\''], $stringWithModulo);
            $query = vsprintf($sql, $builder->getBindings());
        } else {
            $query = $builder->toSql();
        }

        return $withBackQuote ? $query : str_replace('`', '', $query);
    }
}
