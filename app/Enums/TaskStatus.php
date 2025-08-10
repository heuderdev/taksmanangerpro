<?php

namespace App\Enums;

enum TaskStatus: string
{
    case PENDING     = 'pending';
    case IN_PROGRESS = 'in_progress';
    case COMPLETED   = 'completed';

    public function label(): string
    {
        return match($this) {
            self::PENDING => 'Pendente',
            self::IN_PROGRESS => 'Em andamento',
            self::COMPLETED => 'Concluída',
        };
    }
}
