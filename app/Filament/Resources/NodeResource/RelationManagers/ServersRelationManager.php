<?php

namespace App\Filament\Resources\NodeResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Actions\Action;
use Filament\Notifications\Notification;

class ServersRelationManager extends RelationManager
{
    protected static string $relationship = 'servers';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('host')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('port')
                    ->required()
                    ->integer()
                    ->default(22),
                Forms\Components\TextInput::make('user')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->required()
                    ->password()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ram')
                    ->required()
                    ->integer()
                    ->default(8192),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('host')
                    ->getStateUsing(fn ($record) => $record->host.':'.$record->port)
                    ->label('IP Address'),
                Tables\Columns\TextColumn::make('ram')
                    ->label('RAM')
                    ->getStateUsing(fn ($record) => $record->ram.' MB'),
                Tables\Columns\BooleanColumn::make('status'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Action::make('Connect')
                    ->action(function (Model $record) {
                            $record->status = 0;
                            $record->save();
                            $output = $record->executeCommand('echo "test"');
                            if ($output == "test") {
                                $record->status = 1;
                                $record->save();
                            }
                            Notification::make()
                                ->title('Connection established successfully')
                                ->success()
                                ->send();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
