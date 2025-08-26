<?php

namespace App\Trait;

trait PracticeTrait
{
    public function success(string $msg, $data = [], $code = 200){
        return response()->json([
            'msg' => "Success" || $msg,
            'data' => $data
        ], $code);
    }
    public function error(string $msg, $code = 500){
        return response()->json([
            'msg'=>$msg,
        ], $code);
    }
}
