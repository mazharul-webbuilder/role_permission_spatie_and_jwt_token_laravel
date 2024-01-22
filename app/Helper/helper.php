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

/**
 * Advance Query
*/
public function getUpcomingContents(Request $request): JsonResponse
{
    try {
        $perPage = (int) $request->input('per_page', 10);

        // Default Query
        $query = OttContent::select('id', 'uuid', 'title', 'release_date')
            ->with('contentSource')
            ->whereDate('release_date', '>=', Carbon::now())
            ->where('status', '!=', 'Published')
            ->orderBy('release_date', 'ASC');

        // Add Filter to Query
        if ($request->filled('filter')) {
            switch ($request->input('filter')) {
                case 'daily':
                    // Filter for daily content
                    $query = $query->whereDate('release_date', '=', Carbon::now()->startOfDay());
                    break;
                case 'weekly':
                    // Filter for weekly content
                    $query = $query->whereBetween('release_date', [
                        Carbon::now()->startOfWeek(),
                        Carbon::now()->endOfWeek()
                    ]);
                    break;
                case 'monthly':
                    // Filter for monthly content
                    $query = $query->whereBetween('release_date', [
                        Carbon::now()->startOfMonth(),
                        Carbon::now()->endOfMonth()
                    ]);
                    break;
                default:
                    return response()->json([
                        'message' => "Invalid filter Parameter: " . $request->input('filter'),
                        'status' => 502,
                        'data' => null
                    ]);
            }
        }
        // Filter By Date Range
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query = $query->whereBetween('release_date', [$request->input('start_date'), $request->input('end_date')]);
        }

        return response()->json([
            'message' => "Data fetched successfully",
            'status' => 200,
            'data' => $query->paginate($perPage)
        ]);
    } catch (\Exception $exception) {
        return response()->json([
            'message' => $exception->getMessage(),
            'status' => 502,
            'data' => null
        ]);
    }
}

