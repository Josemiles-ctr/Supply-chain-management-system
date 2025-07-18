<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use App\Models\RawMaterialsPurchaseOrder;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RawMaterialsPurchaseOrderResource\Pages;
use App\Filament\Resources\RawMaterialsPurchaseOrderResource\RelationManagers;
use App\Filament\Resources\RawMaterialsPurchaseOrderResource\Pages\EditRawMaterialsPurchaseOrder;
use App\Filament\Resources\RawMaterialsPurchaseOrderResource\Pages\ViewRawMaterialsPurchaseOrder;
use App\Filament\Resources\RawMaterialsPurchaseOrderResource\Pages\ListRawMaterialsPurchaseOrders;
use App\Filament\Resources\RawMaterialsPurchaseOrderResource\Pages\CreateRawMaterialsPurchaseOrder;


class RawMaterialsPurchaseOrderResource extends Resource
{
    protected static ?string $model = RawMaterialsPurchaseOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('rawMaterial_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('supplier_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('quantity')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('price_per_unit')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('order_date')
                    ->required(),
                Forms\Components\DatePicker::make('expected_delivery_date')
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->required(),
                Forms\Components\TextInput::make('notes')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('delivery_option')
                    ->required(),
                Forms\Components\TextInput::make('created_by')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('total_price')
                    ->numeric()
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('rawMaterial.name')
                    ->label('Raw Material')
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price_per_unit')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('order_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('expected_delivery_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->sortable()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'confirmed' => 'success',
                        'cancelled' => 'danger',
                        'delivered' => 'success',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('delivery_option'),
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
                ViewAction::make(),
                EditAction::make(),
                Action::make('markAsDelivered')
                ->label('Mark Delivered')
                ->icon('heroicon-o-truck')
                ->color('success')
                ->action(function ($record) {
                    $record->update(['status' => 'delivered']);
                    Notification::make()
                        ->title('Order marked as delivered')
                        ->success()
                        ->send();
                })
                ->visible(fn ($record) => $record->status == 'confirmed'),
                Action::make('markAsDelivered')
                ->label('Mark Delivered')
                ->icon('heroicon-o-truck')
                ->color('success')
                ->action(function ($record) {
                    $record->update(['status' => 'delivered']);
                    Notification::make()
                        ->title('Order marked as delivered')
                        ->success()
                        ->send();
                })
                ->visible(fn ($record) => $record->status == 'confirmed'),
                
            ])
            ->bulkActions([
                BulkActionGroup::make([
                DeleteBulkAction::make(),
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
            'index' => Pages\ListRawMaterialsPurchaseOrders::route('/'),
            'create' => Pages\CreateRawMaterialsPurchaseOrder::route('/create'),
            'view' => Pages\ViewRawMaterialsPurchaseOrder::route('/{record}'),
            'edit' => Pages\EditRawMaterialsPurchaseOrder::route('/{record}/edit'),
        ];
    }
}