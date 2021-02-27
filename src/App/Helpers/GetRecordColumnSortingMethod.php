<?php

if(!function_exists('getRecordColumnSortingMethod'))
{
    /**
     * Decide the Laravel Eloquent query builder column sorting method.
     *
     * @param  string  $sortingOrder
     * @return string
     */
    function getRecordColumnSortingMethod(string $sortingOrder = 'desc')
    {
        return ($sortingOrder == 'desc') ? 'latest' : 'oldest';
    }
}
