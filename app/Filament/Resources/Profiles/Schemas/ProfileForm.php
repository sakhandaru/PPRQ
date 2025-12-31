<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('nama_lengkap')
                    ->required(),
                TextInput::make('nama_wali')
                    ->required(),
                Textarea::make('alamat')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('pendidikan')
                    ->required(),
                DatePicker::make('tanggal_masuk')
                    ->required(),
                DatePicker::make('tanggal_keluar'),
                TextInput::make('foto_path'),
            ]);
    }
}
