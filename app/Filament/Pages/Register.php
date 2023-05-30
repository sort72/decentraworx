<?php

namespace App\Filament\Pages;

use App\Models\Industry;
use App\Models\UserCategory;
use Closure;
use Illuminate\Support\Facades\Log;
use JeffGreco13\FilamentBreezy\Http\Livewire\Auth\Register as FilamentBreezyRegister;
use JeffGreco13\FilamentBreezy\FilamentBreezy;

use Filament\Forms;

class Register extends FilamentBreezyRegister
{
    // Define the new attributes
    public $type, $user_category_id, $professional, $social_media,
    $comments, $cv, $address, $company_name, $document, $industry_id;

    // Override the getFormSchema method and merge the default fields then add your own.
    protected function getFormSchema(): array
    {
        $categories = UserCategory::orderBy('id', 'ASC')->pluck('name', 'id')->toArray();
        $industries = Industry::orderBy('id', 'ASC')->pluck('name', 'id')->toArray();

        return [
            Forms\Components\Select::make('type')
                ->label('Tipo de usuario')
                ->options([
                    'employee' => 'Empleado',
                    'company' => 'Empresa'
                ])->required()
                ->reactive(),

            Forms\Components\TextInput::make('email')
                ->label(__('filament-breezy::default.fields.email'))
                ->required()
                ->email()
                ->unique(table: config('filament-breezy.user_model'))
                ->hidden(fn (Closure $get) => empty($get('type'))),

            // Employee
            Forms\Components\TextInput::make('name')
                ->label(__('filament-breezy::default.fields.name'))
                ->required(fn (Closure $get) => $get('type') == 'employee')
                ->hidden(fn (Closure $get) => $get('type') != 'employee'),

            Forms\Components\Select::make('user_category_id')
                ->label('Categoría')
                ->required(fn (Closure $get) => $get('type') == 'employee')
                ->hidden(fn (Closure $get) => $get('type') != 'employee')
                ->options($categories),

            Forms\Components\TextInput::make('professional')
                ->label('Profesional')
                ->required(fn (Closure $get) => $get('type') == 'employee')
                ->hidden(fn (Closure $get) => $get('type') != 'employee'),

            Forms\Components\TextInput::make('social_media')
                ->label('Social media')
                ->required(fn (Closure $get) => $get('type') == 'employee')
                ->hidden(fn (Closure $get) => $get('type') != 'employee'),

            Forms\Components\TextInput::make('comments')
                ->label('Experiencia profesional (memo)')
                ->required(fn (Closure $get) => $get('type') == 'employee')
                ->hidden(fn (Closure $get) => $get('type') != 'employee'),

            Forms\Components\FileUpload::make('cv')
                ->label('CV')
                ->preserveFilenames()
                ->required(fn (Closure $get) => $get('type') == 'employee')
                ->hidden(fn (Closure $get) => $get('type') != 'employee'),

            Forms\Components\TextInput::make('social_media')
                ->label('Social media')
                ->required(fn (Closure $get) => $get('type') == 'employee')
                ->hidden(fn (Closure $get) => $get('type') != 'employee'),


            Forms\Components\TextInput::make('address')
                ->label('Dirección')
                ->required(fn (Closure $get) => $get('type') == 'employee')
                ->hidden(fn (Closure $get) => $get('type') != 'employee'),

            // Company
            Forms\Components\TextInput::make('company_name')
                ->label('Nombre de la empresa')
                ->required(fn (Closure $get) => $get('type') == 'company')
                ->hidden(fn (Closure $get) => $get('type') != 'company'),

            Forms\Components\TextInput::make('name')
                ->label('Nombre del representante legal')
                ->required(fn (Closure $get) => $get('type') == 'company')
                ->hidden(fn (Closure $get) => $get('type') != 'company'),

            Forms\Components\TextInput::make('document')
                ->required()
                ->label('NIT')
                ->required(fn (Closure $get) => $get('type') == 'company')
                ->hidden(fn (Closure $get) => $get('type') != 'company'),

            Forms\Components\Select::make('industry_id')
                ->label('Industria')
                ->options($industries)
                ->required(fn (Closure $get) => $get('type') == 'company')
                ->hidden(fn (Closure $get) => $get('type') != 'company'),

            Forms\Components\TextInput::make('comments')
                ->label('Somos (memo)')
                ->required(fn (Closure $get) => $get('type') == 'company')
                ->hidden(fn (Closure $get) => $get('type') != 'company'),

            Forms\Components\TextInput::make('social_media')
                ->label('Social media')
                ->required(fn (Closure $get) => $get('type') == 'company')
                ->hidden(fn (Closure $get) => $get('type') != 'company'),


            /////

            Forms\Components\TextInput::make('password')
                ->label(__('filament-breezy::default.fields.password'))
                ->required()
                ->password()
                ->rules(app(FilamentBreezy::class)->getPasswordRules())
                ->hidden(fn (Closure $get) => empty($get('type'))),

            Forms\Components\TextInput::make('password_confirm')
                ->label(__('filament-breezy::default.fields.password_confirm'))
                ->required()
                ->password()
                ->same('password')
                ->hidden(fn (Closure $get) => empty($get('type'))),
        ];

    }

    // Use this method to modify the preparedData before the register() method is called.
    protected function prepareModelData($data): array
    {
        $preparedData = parent::prepareModelData($data);
        $preparedData['type'] = $this->type;
        $preparedData['user_category_id'] = $this->user_category_id;
        $preparedData['professional'] = $this->professional;
        $preparedData['social_media'] = $this->social_media;
        $preparedData['comments'] = $this->comments;
        $preparedData['cv'] = $this->cv ?? null;
        $preparedData['address'] = $this->address;
        $preparedData['company_name'] = $this->company_name;
        $preparedData['document'] = $this->document;
        $preparedData['industry_id'] = $this->industry_id;

        return $preparedData;
    }
}
