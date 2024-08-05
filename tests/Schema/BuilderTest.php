<?php

namespace Bosnadev\DatabaseTests\Schema;

use Bosnadev\Database\PostgresConnection;
use Bosnadev\Database\Schema\Builder;
use Bosnadev\Database\Schema\Blueprint;
use Bosnadev\DatabaseTests\BaseTestCase;
use Mockery;

class BuilderTest extends BaseTestCase
{
    public function testReturnsCorrectBlueprint(): void
    {
        $connection = Mockery::mock(PostgresConnection::class);

        $connection->shouldReceive('getSchemaGrammar')
            ->once()
            ->andReturn(null);

        $mock = Mockery::mock(Builder::class, [$connection]);

        $mock->makePartial()->shouldAllowMockingProtectedMethods();

        $blueprint = $mock->createBlueprint('test', function (): void {
            // Nothing here...
        });

        $this->assertInstanceOf(Blueprint::class, $blueprint);
    }
}
