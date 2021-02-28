<?php

if(!function_exists('initModuleRecordSummary'))
{
    /**
     * Instantiate the requested module record summary for a specific category.
     *
     * @param  string  $moduleName
     * @param  string  $recordSummaryPathPrefix
     * @return object
     */
    function initModuleRecordSummary(string $moduleName = null, string $recordSummaryPathPrefix = null)
    {
        $request = request();

        $summaryCategory = $request->summarize;

        # Define the provided category to be summarized.
        $summaryCategory = $recordSummaryPathPrefix .str_plural($moduleName) .'\\' .ucwords(camel_case($summaryCategory));

        # Instantiate the requested search result summary category / what to summarize.
        $summaryCategoryClass = new $summaryCategory;

        return $summaryCategoryClass;
    }
}
