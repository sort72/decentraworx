<?php

namespace App\Filament\Resources;

use App\Filament\Pages\PayOffers;
use App\Filament\Resources\OfferResource\Pages;
use App\Filament\Resources\OfferResource\RelationManagers;
use App\Models\Offer;
use Closure;
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
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Relationship;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Facades\Log;
use Filament\Tables\Actions\Action;


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
                                2 => 'Quincenal',
                                3 => 'Mes',
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

                TextColumn::make('Estado')
                    ->hidden(auth()->user()->type != 'employee')
                    ->getStateUsing(function (Offer $record) {
                        return ucwords(__($record->employees()->where('user_id', auth()->user()->id)->first()->pivot->status));
                    }),

                TextColumn::make('Calificación')
                    ->hidden(auth()->user()->type != 'employee')
                    ->getStateUsing(function (Offer $record) {
                        return ucwords(__($record->employees()->where('user_id', auth()->user()->id)->first()->pivot->rate));
                    }),
            ])
            ->filters([
                SelectFilter::make('company_id')
                    ->relationship('company', 'name', fn (Builder $query) => $query->where('type', 'company'))
                    ->label('Empresa')
                    ->hidden(auth()->user()->type == 'company')
                    ->default(auth()->user()->type == 'company' ? auth()->user()->id : null),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),

            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
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

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if(auth()->user()->type == 'company')
            $query = $query->where('company_id', auth()->user()->id);

        else if(auth()->user()->type == 'employee')
            $query = $query->whereHas('employees', function (Builder $query) {
                $query->where('user_id', auth()->user()->id);
            });

        return $query;
    }
}
