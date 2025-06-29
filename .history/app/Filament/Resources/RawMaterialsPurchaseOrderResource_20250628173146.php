<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RawMaterialsPurchaseOrderResource\Pages;
use App\Filament\Resources\RawMaterialsPurchaseOrderResource\Pages\CreateRawMaterialsPurchaseOrder;
use App\Filament\Resources\RawMaterialsPurchaseOrderResource\Pages\EditRawMaterialsPurchaseOrder;
use App\Filament\Resources\RawMaterialsPurchaseOrderResource\Pages\ListRawMaterialsPurchaseOrders;
use App\Filament\Resources\RawMaterialsPurchaseOrderResource\Pages\ViewRawMaterialsPurchaseOrder;
use App\Filament\Resources\RawMaterialsPurchaseOrderResource\RelationManagers;
use App\Models\RawMaterialsPurchaseOrder;
use Filament\Forms;
use Filament\DatePicker;
use Filament\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;


class RawMaterialsPurchaseOrderResource extends Resource
{
    protected static ?string $model = RawMaterialsPurchaseOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function canViewAny(): bool
{
    return Auth::user()?->role == 'manufacturer' || Auth::user()?->role == 'supplier';
}
public static function shouldRegisterNavigation(): bool
{
    return Auth::user()?->role === 'manufacturer' || Auth::user()?->role === 'supplier';
}

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
                Selectio::make('rawMaterial_id')
                ->label('Raw Material')
                    ->required()
                    ->numeric(),
                TextInput::make('supplier_id')
                    ->required()
                    ->numeric(),
                TextInput::make('quantity')
                    ->required()
                    ->numeric(),
                TextInput::make('price_per_unit')
                    ->required()
                    ->numeric(),
                DatePicker::make('order_date')
                    ->required(),
                DatePicker::make('expected_delivery_date')
                    ->required(),
                TextInput::make('status')
                    ->required(),
                TextInput::make('notes')
                    ->maxLength(255)
                    ->default(null),
                TextInput::make('delivery_option')
                    ->required(),
                TextInput::make('created_by')
                    ->required()
                    ->numeric(),
                TextInput::make('total_price')
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
                    ->sortable()
                    ->visible(fn ($record) => Auth::user()?->role == 'manufacturer'),
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
                Action::make('markAsDelivered')
                ->label('Mark As Delivered')
                ->icon('heroicon-o-truck')
                ->color('success')
                ->action(function ($record) {
                    $record->update(['status' => 'delivered']);
                    Notification::make()
                    ->title('Order marked as delivered')
                    ->success()
                    ->send();
                })
                ->visible(fn ($record) => $record->status == 'confirmed' && Auth::User()->role=='manufacturer'),
                Action::make('CancelOrder')
                ->label('Cancel Order')
                ->icon('heroicon-o-x-mark')
                ->color('danger')
                ->action(function ($record) {
                    $record->update(['status' => 'cancelled']);
                    Notification::make()
                    ->title('Order cancelled')
                    ->success()
                    ->send();
                })
                ->visible(fn ($record) => $record->status == 'pending' && Auth::User()->role == 'manufacturer' || $record->status == 'confirmed' && Auth::User()->role == 'manufacturer'),
                Action::make('ConfirmOrder')
                ->label('Confirm Order')
                ->icon('heroicon-o-check')
                ->color('success')
                ->action(function ($record) {
                    $record->update(['status' => 'confirmed']);
                    Notification::make()
                    ->title('Order confirmed')
                    ->success()
                    ->send();
                })
                ->visible(fn ($record) => $record->status == 'pending' && Auth::User()->role == 'supplier'),
                ViewAction::make(),
                EditAction::make()
                ->visible(fn ($record) => Auth::user()?->role === 'manufacturer'),
                
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