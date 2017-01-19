<?php
if(!function_exists('lang')) {
    /**
     * Getting the translations for all contact book related text.
     *
     * @param string $text
     * @param  array $parameters
     * @return string
     */
    function lang($text, $parameters = [])
    {
        return trans('contactbook.'.$text, $parameters);
    }
}