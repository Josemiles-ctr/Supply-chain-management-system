<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\RawMaterial;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
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
    public static function canViewAny(): bool
{
    return Auth::user()?->role == 'manufacturer' || Auth::user()?->role == 'supplier';
}
public static function shouldRegisterNavigation(): bool
{
    return Auth::user()?->role === 'manufacturer' || Auth::user()?->role === 'supplier';
}
public static function beforeCreate(Form $form, $record): void
{
    $record->created_by = Auth::user()->id;
}
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                
                Select::make('rawMaterial_id')
                ->label('Raw Material')
                ->options(RawMaterial::all()->pluck('name', 'id'))
                ->required()
                ->live()
                ->searchable()
                ->preload()
                ->native(false)
                ->afterStateUpdated(function ($state, callable $set) {
                    $price = RawMaterial::find($state)?->price ?? null;
                    $set('price_per_unit', $price);
                }),
                Select::make('supplier_id')
                    ->label('Supplier')
                    ->options(User::query()->where('role', 'supplier')->pluck('name', 'id'))
                    ->required()
                    ->searchable()
                    ->preload()
                    ->native(false),
                TextInput::make('price_per_unit')
                    ->label('Price per Unit in $')
                    ->numeric()
                    ->required()
                    ->reactive()
                    ->readonly()
                    ->disabled(fn ($get) => ! $get('rawMaterial_id'))
                    ->dehydrated(true)
                    ->live()
                    ->extraAttributes(['readonly' => true])
                    ->visible(fn ($get) => $get('rawMaterial_id')),
                    TextInput::make('quantity')
                    ->required()
                    ->live()
                    ->minValue(1)
                    ->default(1),
                DatePicker::make('order_date')
                    ->required(),
                DatePicker::make('expected_delivery_date')
                    ->required(),
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'cancelled' => 'Cancelled',
                        'delivered' => 'Delivered',
                    ])
                    ->default('pending')
                    ->searchable()
                    ->preload()
                    ->native(false)    
                    ->required(),
                Textarea::make('notes')
                    ->label('Notes')
                    ->rows(3)
                    ->placeholder('Any additional notes regarding the order'),
                TextInput::make('delivery_option')
                    ->required(),
                TextInput::make('total_price')
                    ->numeric()
                    ->readonly()
                    ->dehydrated(false)
                    ->default(null)
                    ->reactive()
                    ->afterStateHydrated(function ($state, callable $set, $get) {
                        $price = RawMaterial::find($get('rawMaterial_id'))?->price ?? 0;
                        $quantity = $get('quantity') ?? 0;
                        $set('total_price', $price * $quantity);
                    })
                    ->afterStateUpdated(function ($state, callable $set, $get) {
                        $price = RawMaterial::find($get('rawMaterial_id'))?->price ?? 0;
                        $quantity = $get('quantity') ?? 0;
                        $set('total_price', $price * $quantity);
                    }),
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