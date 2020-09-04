<?php

namespace App\Libs;

class CheckRole {
    public function autherTrue($roleUser, $roles) {
        foreach ($roles as $role) {
            if ($roleUser == $role) {
                return response()->json([
                      'status' => 'error',
                      'errors' => "Forbidden"
                    ], 403);
            }
        }
        return false;
    }
    public function autherFalse($roleUser, $roles) {
        foreach ($roles as $role) {
            if ($roleUser != $role) {
                return response()->json([
                      'status' => 'error',
                      'errors' => "Forbidden"
                    ], 403);
            }
        }
        return false;
    }
}

?>
