<?php

namespace App;

trait ProviderTrait
{
    public function success(string $msg, $data = [], $code = 200) {
        return response()->json([
            'msg'=> $msg,
            'date'=> $data,
        ],$code);
    }

    public function error(string $msg, $code = 500) {
        return response()->json([
            'msg'=> $msg,
        ], $code);
    }
}
