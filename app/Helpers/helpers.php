<?php

function checkPermission($akses) {
    $userAkses = getPermission(auth()->user()->role);
    foreach ($akses as $key => $value) {
        if ($value == $userAkses) {
            return $value;
            return true;
        }
    }
    return false;
}

function getPermission($akses) {
    switch ($akses) {
        case 'Owner':
            return 'Owner';
            break;
        case 'Admin':
            return 'Admin';
            break;
        case 'Kasir':
            return 'Kasir';
            break;
    }
    return $akses;
}