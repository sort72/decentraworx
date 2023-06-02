<?php

namespace App\Filament\Resources\OfferResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeesRelationManager extends RelationManager
{
    protected static string $relationship = 'employees';

    protected static ?string $recordTitleAttribute = 'Postulaciones';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nombre'),

                Forms\Components\TextInput::make('email')
                    ->label('Correo'),

                Forms\Components\Select::make('user_category_id')
                    ->relationship('category', 'name')
                    ->label('Categoría'),

                Forms\Components\TextInput::make('professional')
                    ->label('Profesional'),

                Forms\Components\TextInput::make('comments')
                    ->label('Experiencia profesional (memo)'),

                Forms\Components\FileUpload::make('cv')
                    ->label('CV')
                    ->preserveFilenames()
                    ->reactive(),

                Forms\Components\TextInput::make('social_media')
                    ->label('Social media'),


                Forms\Components\TextInput::make('address')
                    ->label('Dirección'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nombre'),

                Tables\Columns\TextColumn::make('email')
                    ->label('Correo'),

                Tables\Columns\SelectColumn::make('status')
                    ->options([
                        'pending' => 'Pendiente',
                        'approved' => 'Aceptado',
                        'rejected' => 'Rechazado',
                    ])
                    ->label('Estado'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
                // Tables\Actions\AttachAction::make(),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                // Tables\Actions\DetachAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DetachBulkAction::make(),
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
