<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\RawMaterial;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RawMaterialResource\Pages;
use App\Filament\Resources\RawMaterialResource\RelationManagers;

class RawMaterialResource extends Resource
{
    protected static ?string $model = RawMaterial::class;

    protected static ?string $navigationIcon = 'heroicon-o-table-cells';

    protected static ?string $navigationGroup = 'Raw Materials';
    public static function canViewAny():bool{
        return Auth::User()->role== 'manufacturer';
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                Forms\Components\TextInput::make('supplier_id')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('category_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('current_stock')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('reorder_level')
                    ->required()
                    ->numeric()
                    ->default(50),
                Forms\Components\TextInput::make('unit_of_measure')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Unit Price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier.name')
                    ->default('Unknown Supplier')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                     ->default('Uncategorized'),
                Tables\Columns\TextColumn::make('reorder_level')
                         ->numeric()
                         ->sortable(),
                Tables\Columns\TextColumn::make('Comment')
                ->getStateUsing(function($record) {
                    if($record->current_stock < $record->reorder_level){
                        return 'Out Of Stock';
                    }else if($record->current_stock > $record->reorder_level  && $record->current_stock < $record->reorder_level * 2 ){
                        return 'Running Out Of Stock';
                    }
                    return 'Still In Stock';
                })
                ->label('Comment'),
                Tables\Columns\TextColumn::make('current_stock')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('unit_of_measure'),
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
            'index' => Pages\ListRawMaterials::route('/'),
            'create' => Pages\CreateRawMaterial::route('/create'),
            'view' => Pages\ViewRawMaterial::route('/{record}'),
            'edit' => Pages\EditRawMaterial::route('/{record}/edit'),
        ];
    }
}