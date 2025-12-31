<?php

namespace App\Filament\Resources\Users\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProfileRelationManager extends RelationManager
{
    protected static string $relationship = 'profile';

    protected static ?string $title = 'Profil Penghuni';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            FileUpload::make('foto_path')
                ->label('Foto')
                ->image()
                ->directory('profiles')
                ->imagePreviewHeight('150')
                ->maxSize(2048),

            TextInput::make('nama_lengkap')
                ->required()
                ->maxLength(255),

            TextInput::make('nama_wali')
                ->required()
                ->maxLength(255),

            Textarea::make('alamat')
                ->required()
                ->columnSpanFull(),

            TextInput::make('pendidikan')
                ->required()
                ->maxLength(255),

            DatePicker::make('tanggal_masuk')
                ->required(),

            DatePicker::make('tanggal_keluar')
                ->nullable(),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama_lengkap')
            ->columns([
                ImageColumn::make('foto_path')
                    ->label('Foto')
                    ->circular(),

                TextColumn::make('nama_lengkap')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('pendidikan')
                    ->sortable(),

                TextColumn::make('tanggal_masuk')
                    ->date()
                    ->sortable(),

                TextColumn::make('tanggal_keluar')
                    ->date()
                    ->sortable()
                    ->toggleable(),
            ])
            ->headerActions([
                CreateAction::make()
                    ->visible(fn () => $this->ownerRecord->profile === null),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
