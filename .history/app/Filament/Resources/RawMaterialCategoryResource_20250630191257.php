<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\RawMaterialCategory;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RawMaterialCategoryResource\Pages;
use App\Filament\Resources\RawMaterialCategoryResource\RelationManagers;

class RawMaterialCategoryResource extends Resource
{
    protected static ?string $model = RawMaterialCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-bars-arrow-down';
    protected static ?string $navigationGroup ='Raw Materials';
    public static function canViewAny(): bool
    {
        return Auth::user()?->role === 'manufacturer';
    }
    public static function getEloquentQuery(): Builder
{
    return parent::getEloquentQuery()
        ->orderByDesc('created_at'); // 🠔 newest records first
}
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('New Rawmaterial Category')
                ->description('Enter Name and Simple Description')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('description')
                        ->maxLength(255)
                        ->default(null),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListRawMaterialCategories::route('/'),
            'create' => Pages\CreateRawMaterialCategory::route('/create'),
            'view' => Pages\ViewRawMaterialCategory::route('/{record}'),
            'edit' => Pages\EditRawMaterialCategory::route('/{record}/edit'),
        ];
    }
}