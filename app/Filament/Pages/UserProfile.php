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
        switch (request()->user()->type) {
            case 'admin':
                return parent::getUpdateProfileFormSchema();

            case 'employee':
                return array_merge(parent::getUpdateProfileFormSchema(), [
                    Forms\Components\Select::make('user_category_id')
                        ->label('Categoría')
                        ->relationship('category', 'name'),

                    Forms\Components\TextInput::make('professional')
                        ->label('Profesional'),

                    Forms\Components\TextInput::make('comments')
                        ->label('Experiencia profesional (memo)'),

                    Forms\Components\FileUpload::make('cv')
                        ->label('CV')
                        ->directory('user-uploads')
                        // ->preserveFilenames()
                        ->reactive(),

                    Forms\Components\TextInput::make('social_media')
                        ->label('Social media'),


                    Forms\Components\TextInput::make('address')
                        ->label('Dirección'),
                ]);

            case 'company':
                return [
                    Forms\Components\TextInput::make('company_name')
                        ->required()
                        ->label('Nombre de la empresa'),

                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->label('Nombre del representante legal'),

                    Forms\Components\TextInput::make('email')
                        ->required()
                        ->email()
                        ->label('Correo electrónico'),

                    Forms\Components\TextInput::make('document')
                        ->required()
                        ->label('NIT'),

                    Forms\Components\Select::make('industry_id')
                        ->label('Industria')
                        ->relationship('industry', 'name'),

                    Forms\Components\TextInput::make('comments')
                        ->label('Somos (memo)'),

                    Forms\Components\TextInput::make('social_media')
                        ->label('Social media'),
                ];
        }

        return [];
    }

    protected static function shouldRegisterNavigation(): bool
    {
        return true;
    }

}
