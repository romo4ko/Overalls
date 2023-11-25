<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployerResource\Pages;
use App\Filament\Resources\EmployerResource\RelationManagers;
use App\Models\Employer;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployerResource extends Resource
{
    protected static ?string $model = Employer::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('firstname')->label('Имя'),
                Forms\Components\TextInput::make('lastname')->label('Фамилия'),
                Forms\Components\TextInput::make('job')->label('Должность'),
                Forms\Components\Select::make('workshop_id')->relationship('workshop', 'name')->label('Цех'),
                Forms\Components\TextInput::make('sale')->label('Скидка %'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('firstname')->label('Имя'),
                Tables\Columns\TextColumn::make('lastname')->label('Фамилия'),
                Tables\Columns\TextColumn::make('job')->label('Должность'),
                Tables\Columns\TextColumn::make('workshop.name')->label('Цех'),
                Tables\Columns\TextColumn::make('sale')->label('Скидка %'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEmployers::route('/'),
            'create' => Pages\CreateEmployer::route('/create'),
            'edit' => Pages\EditEmployer::route('/{record}/edit'),
        ];
    }    
}
