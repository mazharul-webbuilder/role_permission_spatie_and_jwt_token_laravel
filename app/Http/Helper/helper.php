<?php



function getSearchQuery($query, $queryString, ...$columns)
{
    return $query->where(function ($query) use ($queryString, $columns){
        foreach ($columns as $column) {
            $query->orWhere($column, 'like', "%$queryString%");
        }
    });
}
