<?php

namespace App\Exports;

use App\Models\Project;
use App\Models\User;
use App\Models\Task;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use PhpOffice\PhpSpreadsheet\Style\Border;

class ProjectReportExport implements WithMultipleSheets
{
    protected $projectId;

    public function __construct($projectId)
    {
        $this->projectId = $projectId;
    }

    public function sheets(): array
    {
        return [
            new ProjectSheet($this->projectId),
            new ParticipantsSheet($this->projectId),
            new TasksSheet($this->projectId),
        ];
    }
}

class ProjectSheet implements FromCollection, WithHeadings, WithMapping, WithTitle, WithEvents
{
    protected $projectId;

    public function __construct($projectId)
    {
        $this->projectId = $projectId;
    }

    public function collection()
    {
        return Project::where('id', $this->projectId)->get();
    }

    public function headings(): array
    {
        return [
            'Название проекта',
            'Описание',
            'Дата начала',
            'Дата окончания',
        ];
    }

    public function map($project): array
    {
        return [
            $project->name,
            $project->description,
            $project->start,
            $project->end,
        ];
    }

    public function title(): string
    {
        return 'Информация о проекте';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->getColumnDimension('A')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('C')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('D')->setAutoSize(true);

                // Добавляем обводку для заголовков и данных
                $event->sheet->getStyle('A1:D1')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                        ],
                    ],
                ]);

                $event->sheet->getStyle('A2:D' . (count($this->collection()) + 1))->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                        ],
                    ],
                ]);
            },
        ];
    }
}

class ParticipantsSheet implements FromCollection, WithHeadings, WithMapping, WithTitle, WithEvents
{
    protected $projectId;

    public function __construct($projectId)
    {
        $this->projectId = $projectId;
    }

    public function collection()
    {
        $project = Project::find($this->projectId);
        $participants = $project->invites()->where('status', 'accepted')->with('user')->get();
        $participants->push($project->user); // Добавляем создателя проекта
        return $participants;
    }

    public function headings(): array
    {
        return [
            'ID пользователя',
            'Имя',
            'Email',
        ];
    }

    public function map($participant): array
    {
        if ($participant instanceof \App\Models\User) {
            return [
                $participant->id,
                $participant->name,
                $participant->email,
            ];
        } else {
            return [
                $participant->user->id,
                $participant->user->name,
                $participant->user->email,
            ];
        }
    }

    public function title(): string
    {
        return 'Участники';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->getColumnDimension('A')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('C')->setAutoSize(true);

                // Добавляем обводку для заголовков и данных
                $event->sheet->getStyle('A1:C1')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                        ],
                    ],
                ]);

                $event->sheet->getStyle('A2:C' . (count($this->collection()) + 1))->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                        ],
                    ],
                ]);
            },
        ];
    }
}

class TasksSheet implements FromCollection, WithHeadings, WithMapping, WithTitle, WithEvents
{
    protected $projectId;

    public function __construct($projectId)
    {
        $this->projectId = $projectId;
    }

    public function collection()
    {
        return Task::where('project_id', $this->projectId)->get();
    }

    public function headings(): array
    {
        return [
            'Название задачи',
            'Крайний срок',
            'Статус',
            'ID пользователя',
            'Имя пользователя',
            'Email пользователя',
        ];
    }

    public function map($task): array
    {
        $status = $task->status === 'done' ? 'выполнено' : 'не выполнено';

        return [
            $task->name,
            $task->deadline,
            $status,
            $task->user->id,
            $task->user->name,
            $task->user->email,
        ];
    }

    public function title(): string
    {
        return 'Задачи';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->getColumnDimension('A')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('C')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('D')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('E')->setAutoSize(true);
                $event->sheet->getDelegate()->getColumnDimension('F')->setAutoSize(true);

                // Добавляем обводку для заголовков и данных
                $event->sheet->getStyle('A1:F1')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                        ],
                    ],
                ]);

                $event->sheet->getStyle('A2:F' . (count($this->collection()) + 1))->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                        ],
                    ],
                ]);
            },
        ];
    }
}
