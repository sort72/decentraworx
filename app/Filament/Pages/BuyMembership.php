<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class BuyMembership extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static ?string $navigationLabel = "Membresía premium";

    protected static ?string $title = "Membresía premium";

    protected static string $view = 'filament.pages.buy-membership';

    protected static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->type == 'employee' && auth()->user()->is_approved;
    }
}
