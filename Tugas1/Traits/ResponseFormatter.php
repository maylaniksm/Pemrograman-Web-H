<?php

namespace Traits;

trait ResponseFormatter {
    public static function success($data = null, $message = null) {
        return [
            "code" => 200,
            "message" => $message ?? "Success",
            "data" => $data
        ];
    }

    public static function error($message = null, $code = 400) {
        return [
            "code" => $code,
            "message" => $message,
            "data" => null
        ];
    }
}