<?php
 
namespace AppTransformers;
 
class Json
{
    public static function response($data = null, $message = null)
    {
        return [
            'data'    => $data,
            'message' => $message,
        ];
    }
}