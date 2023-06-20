<?php

namespace App\Http\Livewire\Arsys\Data;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\ArSys\StudyProgram;

class ProgramsTable extends DataTableComponent
{
    protected $model = StudyProgram::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Code", "code")
                ->sortable(),
            Column::make("Description", "description")
                ->sortable(),
        ];
    }
}
