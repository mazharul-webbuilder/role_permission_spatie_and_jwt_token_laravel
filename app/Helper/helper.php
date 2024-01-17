<?php



/**
 * This is custom universal method, you can pass undefined numbers of columns to filter data
*/
function getSearchQuery($query, $queryString, ...$columns)
{
    return $query->where(function ($query) use ($queryString, $columns){
        foreach ($columns as $column) {
            $query->orWhere($column, 'like', "%$queryString%");
        }
    });
}
