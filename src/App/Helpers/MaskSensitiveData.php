<?php

if(!function_exists('maskSensitiveData')) {

    /**
     * Mask sensitive data.
     *
     * @param  array  $input
     * @return void
     */
    function maskSensitiveData(array $input = [])
    {
        $request = request();

        foreach($request->post() as $key => $value) {
            if(in_array($key, $input)) {
                $request->merge([
                    $key => str_repeat('*', strlen($value)),
                ]);
            }
        }
    }
}
