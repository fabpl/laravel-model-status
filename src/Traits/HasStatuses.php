<?php

namespace Fabpl\ModelStatus\Traits;

use Fabpl\ModelStatus\Exceptions\InvalidStatusException;
use Fabpl\ModelStatus\Models\Status;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasStatuses
{
    /**
     * Get available status list.
     *
     * @return array
     */
    abstract public function getAvailableStatus(): array;

    /**
     * Get latest's status name.
     *
     * @return string|null
     */
    public function getStatusAttribute(): ?string
    {
        $statuses = $this->relationLoaded('statuses') ? $this->statuses : $this->statuses();
        $status = $statuses->first();

        return $status ? $status->name : null;
    }

    /**
     * Check if given status is available.
     *
     * @param string $status
     *
     * @return bool
     */
    public function isValidStatus(string $status): bool
    {
        return in_array($status, $this->getAvailableStatus());
    }

    /**
     * Set status.
     *
     * @param string $status
     *
     * @throws InvalidStatusException
     *
     * @return $this
     */
    public function setStatus(string $status): self
    {
        if (!$this->isValidStatus($status)) {
            throw InvalidStatusException::factory($status);
        }

        $this->statuses()->create([
            'name' => $status,
        ]);

        return $this;
    }

    /**
     * Statuses relation.
     *
     * @return MorphMany
     */
    public function statuses(): MorphMany
    {
        return $this->morphMany(
            config('model-status.model', Status::class),
            'model',
            'model_type',
            'model_id'
        )
            ->latest('id');
    }
}
