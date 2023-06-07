<?php

namespace App\Filament\Resources\OfferResource\Pages;

use App\Filament\Pages\PayOffers;
use App\Filament\Resources\OfferResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOffers extends ListRecords
{
    protected static string $resource = OfferResource::class;

    protected static string $view = 'filament.resources.offers.pages.list-offers';

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function payRoute()
    {
        return PayOffers::getUrl();
    }
}
