<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProfileInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('nama_lengkap'),
                TextEntry::make('nama_wali'),
                TextEntry::make('alamat')
                    ->columnSpanFull(),
                TextEntry::make('pendidikan'),
                TextEntry::make('tanggal_masuk')
                    ->date(),
                TextEntry::make('tanggal_keluar')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('foto_path')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
