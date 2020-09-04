<?php

namespace App\Libs;

class ReturnStatus {
    public function returnSuccess($arg, $params) {
        return response()->json([
              'status' => 'success',
              $arg => $params
            ], 200);
    }

    public function returnError($error, $number) {
        return response()->json([
              'status' => 'error',
              'errors' => $error
            ], $number);
    }
}

?>
