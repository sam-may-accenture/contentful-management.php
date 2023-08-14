<?php

declare(strict_types=1);

namespace Contentful\Management\SystemProperties\Component;
use Contentful\Management\SystemProperties\Component\ActionStatus;

trait ActionStatusTrait
{
    /**
     * @var ActionStatus
     */
    protected $status;

    protected function initStatus(array $data)
    {
        $status = $data['status'] ?? '';
        $this->status = ActionStatus::tryFrom($status) ?? ActionStatus::Blank;
    }

    protected function jsonSerializeStatus(): array
    {
        return [
            'status' => $this->status->value,
        ];
    }

    public function getStatus(): ActionStatus
    {
        return $this->status;
    }
}
