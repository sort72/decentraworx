<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OfferResource\Pages;
use App\Filament\Resources\OfferResource\RelationManagers;
use App\Models\Offer;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OfferResource extends Resource
{
    protected static ?string $model = Offer::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $modelLabel = "Oferta";
    protected static ?string $pluralModelLabel = "Ofertas";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Hidden::make('company_id')
                            ->default(auth()->user()->id),

                        TextInput::make('name')
                            ->required()
                            ->autofocus()
                            ->label('Título de la oferta'),

                        TextInput::make('area')
                            ->required()
                            ->label('Area'),

                        TextInput::make('knowledge')
                            ->required()
                            ->label('Conocimientos'),

                        TextInput::make('details')
                            ->required()
                            ->label('Detalles del trabajo'),

                        Select::make('contract_type')
                            ->options([
                                0 => 'Fijo',
                                1 => 'Obra labor',
                                2 => 'Freelance',
                            ])
                            ->label('Tipo de contrato')
                            ->required(),

                        DatePicker::make('start_date')
                            ->label('Fecha de inicio')
                            ->required()
                            ->rules(['date']),

                        DatePicker::make('end_date')
                            ->label('Fecha de finalización')
                            ->required()
                            ->rules(['date']),


                        Select::make('payment_type')
                            ->options([
                                0 => 'Hora',
                                1 => 'Entregable',
                                2 => 'Mes',
                                3 => 'Quincenal',
                            ])
                            ->label('Forma de pago')
                            ->required(),

                        TextInput::make('amount')
                            ->numeric()
                            ->required()
                            ->minValue(0)
                            ->label('Valor'),

                        TextInput::make('location')
                            ->required()
                            ->label('Ubicación de la oferta'),



                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('company.name')
                    ->hidden(auth()->user()->type == 'company')
                    ->label('Empresa')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('name')
                    ->label('Título de la oferta')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\EmployeesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOffers::route('/'),
            'create' => Pages\CreateOffer::route('/create'),
            'edit' => Pages\EditOffer::route('/{record}/edit'),
        ];
    }
}
