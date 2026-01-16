<?php
namespace App\Traits;

trait BaseResponse {

    public function success($statusCode = 200 , $message , $data = [])
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ],$statusCode);
    }

    public function error($statusCode = 401 , $message , $data = [])
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => $data
        ],$statusCode);
    }

}

