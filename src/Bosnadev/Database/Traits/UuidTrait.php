<?php

declare(strict_types=1);

namespace Bosnadev\Database\Traits;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use RuntimeException;

trait UuidTrait
{
    protected static function bootUuidTrait(): void
    {
        static::creating(function (Model $model): void {
            $this->provideUuidKey($model);
        });
    }

    protected function provideUuidKey(Model $model): void
    {
        if ($model->incrementing === false) {
            $key = $model->getKeyName();

            if (empty($model->getAttribute($key))) {
                $model->{$key} = (string) Uuid::uuid4();
            }
        } else {
            throw new RuntimeException(
                sprintf(
                    '$incrementing must be false on class "%s" to support uuid',
                    static::class
                )
            );
        }
    }
}
