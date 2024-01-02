<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;

class AccessControlService
{
    public function canCreateHotel(): void
    {
        if (! Auth::check()) {
            throw new UnauthorizedException('Você não tem permissão para criar um hotel.');
        }
    }

    public function canShowHotel(): void
    {
        if (! Auth::check()) {
            throw new UnauthorizedException('Você não tem permissão para criar um hotel.');
        }
    }

    public function canListHotels(): void
    {
        if (! Auth::check()) {
            throw new UnauthorizedException('Você não tem permissão para criar um hotel.');
        }
    }

    public function canUpdateHotel(): void
    {
        if (! Auth::check()) {
            throw new UnauthorizedException('Você não tem permissão para criar um hotel.');
        }
    }

    public function canDeleteHotel(): void
    {
        if (! Auth::check()) {
            throw new UnauthorizedException('Você não tem permissão para criar um hotel.');
        }
    }

    public function canForceDeleteHotel(): void
    {
        if (! Auth::check()) {
            throw new UnauthorizedException('Você não tem permissão para criar um hotel.');
        }
    }
}
