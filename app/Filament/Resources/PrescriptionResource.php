<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrescriptionResource\Pages;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use App\Models\Prescription;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PrescriptionResource extends Resource
{
    protected static ?string $model = Prescription::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Other form fields first
                TextInput::make('illness')
                    ->required()
                    ->maxLength(255),
                TextInput::make('more_infos')
                    ->maxLength(255),
                Hidden::make('user_id')
                    ->default(fn() => auth()->id()),
                Repeater::make('medicines')
                    ->relationship('medicines')
                    ->schema([
                        TextInput::make('name')
                            ->label('Medicine Name')
                            ->required(),
                        TextInput::make('dosage')
                            ->required(),
                        TextInput::make('form')
                            ->required(),
                        TextInput::make('route_of_administration'),
                        TextInput::make('frequency'),
                        TextInput::make('duration'),
                        TextInput::make('quantity'),
                        Repeater::make('alternatives')
                            ->relationship('alternatives') // Make sure this relationship is defined in the Medicine model
                            ->schema([
                                TextInput::make('name')
                                    ->label('Medicine Name')
                                    ->required(),
                                TextInput::make('dosage')
                                    ->required(),
                                TextInput::make('form')
                                    ->required(),
                                TextInput::make('route_of_administration'),
                                TextInput::make('frequency'),
                                TextInput::make('duration'),
                                TextInput::make('quantity'),
                            ])->columns(2)
                            ->columnSpan(3)
                            ->reorderable(true)


                    ])
                    ->columns(3)
                    ->columnSpan(2)
                    ->minItems(1)
                    ->reorderable(true)
                    ->createItemButtonLabel('Add Medicine'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('illness')
                    ->searchable(),
                TextColumn::make('more_infos')
                    ->searchable(),
                TextColumn::make('user.name')
                    ->label('Admin Name') // Optional, to customize the column label
                    ->sortable() // To make the column sortable
                    ->searchable(), // To make the column searchable
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('view_medicines')
                    ->url(fn(Prescription $record): string => route('prescription.view', ['id' => $record->id])) // Use 'id' instead of 'illness'
                    ->openUrlInNewTab()
                    ->label('View Medicines')
                    ->icon('heroicon-o-eye')
                    ->color('primary'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListPrescriptions::route('/'),
            'create' => Pages\CreatePrescription::route('/create'),
            'edit' => Pages\EditPrescription::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
