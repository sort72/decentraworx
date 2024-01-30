<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $modelLabel = "Usuario";
    protected static ?string $pluralModelLabel = "Usuarios";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                \Filament\Forms\Components\TextInput::make('name')
                    ->required()
                    ->autofocus()
                    ->label('Nombre'),

                \Filament\Forms\Components\TextInput::make('email')
                    ->required(),

                Forms\Components\Select::make('user_category_id')
                    ->label('Categoría')
                    ->relationship('category', 'name'),

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
                    ->label('Dirección')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),

                ToggleColumn::make('is_approved')
                    ->label('Aprobado')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }



    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        $query = $query->where('type', 'employee');

        return $query;
    }
}
