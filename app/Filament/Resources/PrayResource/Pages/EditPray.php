<?php

namespace App\Filament\Resources\PrayResource\Pages;

use App\Filament\Resources\PrayResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPray extends EditRecord
{
    protected static string $resource = PrayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
