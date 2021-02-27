<?php

if(!function_exists('getColumnToSort'))
{
    /**
     * Decide the database table column to sort.
     *
     * @param  mixed  $builder
     * @param  string  $columnToSort
     * @return string
     */
    function getColumnToSort($builder, string $columnToSort = null)
    {
        # Fetch the table name.
        $table = $builder->getModel()->getTable();

        # Fetch the primary key (also become the fallback column to sort).
        $primaryKey = $builder->getModel()->getKeyName();

        # Check for the requested column presence.
        $columnPresent = \Schema::hasColumn($table, $columnToSort);

        # Fallback to the primary key if the requested column is absent.
        if(!$columnPresent) {
            $columnToSort = $primaryKey;
        }

        return $columnToSort;
    }
}
