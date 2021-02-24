<?php

use BuilderToSql\Helper\BuilderToSql;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

if (! function_exists('builder_to_sql')) {

    /**
     * Render Eloquent or Query builder to sql
     *
     * @param EloquentBuilder|QueryBuilder $builder
     * @param bool $withBackQuote
     * @return string
     */
    function builder_to_sql($builder, bool $withBackQuote = false): string
    {
        return BuilderToSql::render($builder, $withBackQuote);
    }
}
