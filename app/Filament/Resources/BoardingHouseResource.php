<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BoardingHouseResource\Pages;
use App\Filament\Resources\BoardingHouseResource\RelationManagers;
use App\Models\BoardingHouse;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class BoardingHouseResource extends Resource
{
    protected static ?string $model = BoardingHouse::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Tabs::make('tabs')
                ->tabs([
                    Tab::make('Informasi Umum')
                    ->schema([
                        //
                        FileUpload::make('thumbnail')
                            ->image()
                            ->directory('boarding_house')
                            ->required()
                            ->columnSpan(2),
                        TextInput::make('name')->required()
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))->live(debounce: 1000)
                            ->maxLength(255),
                        TextInput::make('slug')->readOnly(),
                        Select::make('city_id')
                            ->relationship('city', 'name')
                            ->required()
                            ->columnSpan(2),
                        Select::make('category_id')
                            ->relationship('category', 'name')
                            ->required()
                            ->columnSpan(2),
                        RichEditor::make('description')->required()
                            ->columnSpan(2),
                        TextInput::make('price')
                            ->numeric()
                            ->prefix('IDR')
                            ->required()
                            ->columnSpan(2),
                        Textarea::make('address')->required()
                            ->columnSpan(2),


                    ]),
                    Tab::make('Bonus')
                    ->schema([
                        //
                        Repeater::make('bonuses')
                        ->schema([
                            FileUpload::make('image')
                            ->image()
                            ->directory('bonuses')
                            ->required()
                            ->columnSpan(2),
                            TextInput::make('name')->required(),
                            TextInput::make('description')->required(),
                        ])
                        ->columns(2)
                    ]),
                    Tab::make('Tab 3')
                    ->schema([
                        //
                    ]),
                ])->columnSpan(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListBoardingHouses::route('/'),
            'create' => Pages\CreateBoardingHouse::route('/create'),
            'edit' => Pages\EditBoardingHouse::route('/{record}/edit'),
        ];
    }
}
