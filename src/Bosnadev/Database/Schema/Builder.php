<?php

declare(strict_types=1);

namespace Bosnadev\Database\Schema;

use Closure;

class Builder extends \Illuminate\Database\Schema\PostgresBuilder
{
    /**
     * @param string $table
     *
     * @return Blueprint
     */
    protected function createBlueprint($table, Closure $callback = null)
    {
        return new Blueprint($table, $callback);
    }
}
