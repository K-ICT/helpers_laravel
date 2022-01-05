<?php

if(!function_exists('excludeDataFromBeingLogged')) {

    /**
     * Exclude the specified data from being logged.
     *
     * @param  array  $input
     * @return void
     */
    function excludeDataFromBeingLogged(array $input = [])
    {
        $request = request();

        foreach($request->post() as $key => $value) {
            if(in_array($key, $input)) {
                unset($request[$key]);
            }
        }
    }
}
