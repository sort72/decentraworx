<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class PayOffers extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = "Comprar paquetes";

    protected static ?string $title = "Comprar paquetes";

    protected static string $view = 'filament.pages.pay-offers';

    protected static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->type == 'company';
    }
}
