<?php

namespace App\Filament\Resources\Menus\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;

class MenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode')
                    ->required(),
                TextInput::make('nama')
                    ->required(),
                Textarea::make('deskripsi')
                    ->default(null)
                    ->columnSpanFull(),
                Select::make('kategori')
                    ->options([
                        'sarapan' => 'Sarapan',
                        'makan-siang' => 'Makan siang',
                        'makan-malam' => 'Makan malam',
                        'camilan' => 'Camilan',
                    ])
                    ->required(),
                Select::make('jenis')
                    ->options([
                        'tinggi-protein' => 'Tinggi protein',
                        'rendah-kalori' => 'Rendah kalori',
                        'tinggi-kalori' => 'Tinggi kalori',
                        'vegan' => 'Vegan',
                        'gluten-free' => 'Gluten free',
                        'low-carb' => 'Low carb',
                    ])
                    ->default('tinggi-protein')
                    ->required(),
                FileUpload::make('image')
                    ->required()
                    ->columnSpanFull(),

            ]);
    }
}
