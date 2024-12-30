<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Filament\Resources\TransactionResource\RelationManagers;
use App\Models\Transaction;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

use function Laravel\Prompts\select;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('code')->required()->columnSpan(2),
                Select::make('boarding_house_id')
                ->relationship('boardingHouse', 'name')
                ->required(),
                Select::make('room_id')
                ->relationship('room', 'name')
                ->required(),
                TextInput::make('name')->required()->columnSpan(2),
                TextInput::make('email')->email()->required(),
                TextInput::make('phone')->numeric()->required(),
                Select::make('payment_method')->options([
                    'down_payment' => 'Down Payment',
                    'full_payment' => 'Full Payment',
                ])->required(),
                Select::make('payment_status')->options([
                    'pending' => 'Pending',
                    'paid' => 'Paid',
                ])->required(),
                DatePicker::make('start_date')->required(),
                TextInput::make('duration')->numeric()->required(),
                TextInput::make('total_amount')->numeric()->prefix('IDR')->required(),
                DatePicker::make('transaction_date')->required(),            
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('code'),
                TextColumn::make('boardingHouse.name')->label('Boarding House'),
                TextColumn::make('room.name')->label('Room'),
                TextColumn::make('name'),
                TextColumn::make('payment_method'),
                TextColumn::make('payment_status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning',
                    'paid' => 'success',
                }),
                TextColumn::make('start_date'),
                TextColumn::make('duration'),
                TextColumn::make('total_amount'),
                TextColumn::make('transaction_date'),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
