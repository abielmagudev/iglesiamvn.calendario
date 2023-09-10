<?php 

// Form

if(! function_exists('isChecked') )
{
    function isChecked(bool $bool, $default = '')
    {
        return $bool ? 'checked' : $default;
    }
}

if(! function_exists('isSelected') )
{
    function isSelected(bool $bool, $default = '')
    {
        return $bool ? 'selected' : $default;
    }
}

if(! function_exists('isRequired') )
{
    function isRequired(bool $bool, $default = '')
    {
        return $bool ? 'required' : $default;
    }
}

// Misc

if(! function_exists('convertirLinks') )
{
    function convertirLinks(string $texto)
    {
        $url_pattern = '~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i';   
        return preg_replace($url_pattern, '<a href="$0" target="_blank">$0</a>', $texto);
    }
}
