<?php

if(!function_exists('getDefaultSearchFilterQueryBuilder'))
{
    /**
     * Build default Eloquent query.
     *
     * @param  mixed  $query
     * @param  array  $relationships
     * @return string
     */
    function getDefaultSearchFilterQueryBuilder($query, array $relationships = [])
    {
        # Extract the relationships array.
        $modelWith = $relationships['model_with'] ?? [];
        $modelHas = $relationships['model_has'] ?? [];
        $modelDoesntHave = $relationships['model_doesnt_have'] ?? [];

        # Build the query.
        $builder = $query->with($modelWith)
        ->where(function ($subquery) use ($modelHas){
            foreach($modelHas as $value) {
                $subquery->has($value);
            }
        })
        ->where(function ($subquery) use ($modelDoesntHave){
            foreach($modelDoesntHave as $value) {
                $subquery->doesnthave($value);
            }
        });

        return $builder;
    }
}
