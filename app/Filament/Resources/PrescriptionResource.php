<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrescriptionResource\Pages;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
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
                TextInput::make('category')
                    ->required()
                    ->maxLength(255),
                RichEditor::make('more_info')->toolbarButtons([
                    'blockquote',
                    'bold',
                    'bulletList',
                    'heading',
                    'italic',
                    'link',
                    'orderedList',
                    'redo',
                    'strike',
                    'table',
                    'undo',
                ])
                    ->columnSpan(2)->label('More Info'),
                Hidden::make('user_id')
                    ->default(fn() => auth()->id()),
                // ------------repeater -------------\\
                Repeater::make('medicines')
                    ->relationship('medicines')
                    ->schema([
                        TextInput::make('name')
                            ->label('Medicine Name')

                            ->required(),
                        TextInput::make('dosage_mg')
                            ->required(),
                        TextInput::make('form')
                            ->required(),
                        TextInput::make('route_of_administration'),
                        TextInput::make('frequency'),
                        TextInput::make('duration'),
                        TextInput::make('quantity'),
                        // -------------- nested repeater-----------------\\
                        Repeater::make('alternatives')
                            ->relationship('alternatives')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Medicine Name')
                                    ->required(),
                                TextInput::make('dosage_mg')
                                    ->required(),
                                TextInput::make('form')
                                    ->required(),
                                TextInput::make('route_of_administration'),
                                TextInput::make('frequency'),
                                TextInput::make('duration'),
                                TextInput::make('quantity'),
                            ])
                            ->columns(2)
                            ->columnSpan(3)
                            ->createItemButtonLabel('ou')
                            ->defaultItems(0)->grid(2)
                            ->collapsible()->itemLabel(fn(array $state): ?string => $state['name'] ?? null),
                    ])
                    ->columns(3)
                    ->columnSpan(2)
                    ->reorderableWithButtons()
                    ->reorderable(true)
                    ->createItemButtonLabel('et')
                    ->collapsible()->itemLabel(fn(array $state): ?string => $state['name'] . (isset ($state['alternatives']) && count($state['alternatives']) > 0 ? ' or ' . implode(', ', array_column($state['alternatives'], 'name')) : '') ?? null)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('illness')
                    ->searchable(),
                TextColumn::make('category')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('Admin Name') // Optional, to customize the column label
                    ->sortable() // To make the column sortable
                    ->searchable(), // To make the column searchable
                TextColumn::make('created_at')
                    ->label('Date')
                    ->dateTimeTooltip()
                    ->sortable()
                ,
                TextColumn::make('updated_at')
                    ->label('Edited')
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
                    ->color('success'),
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
