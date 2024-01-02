<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;

class AccessControlService
{
    function canCreateHotel() : void {
        if (!Auth::check()) {
            throw new UnauthorizedException('Você não tem permissão para criar um hotel.');
        }
    }

    function canShowHotel() : void {
        if (!Auth::check()) {
            throw new UnauthorizedException('Você não tem permissão para criar um hotel.');
        }
    }

    function canListHotel() : void {
        if (!Auth::check()) {
            throw new UnauthorizedException('Você não tem permissão para criar um hotel.');
        }
    }

    function canUpdateHotel() : void {
        if (!Auth::check()) {
            throw new UnauthorizedException('Você não tem permissão para criar um hotel.');
        }
    }
}
