<?php

namespace App\Filament\Pages;

use JeffGreco13\FilamentBreezy\Pages\MyProfile as BaseProfile;
use Filament\Forms;


class UserProfile extends BaseProfile
{
    // protected static ?string $navigationIcon = 'heroicon-o-document-text';

    // protected static string $view = 'filament.pages.user-profile';

    protected function getUpdateProfileFormSchema(): array
    {
        return array_merge(parent::getUpdateProfileFormSchema(), [
            Forms\Components\TextInput::make("job_title"),
            Forms\Components\Checkbox::make("marketing_consent")->label(
                "I consent to receive email notifications....."
            ),
        ]);
    }

    protected static function shouldRegisterNavigation(): bool
    {
        return true;
    }

}
