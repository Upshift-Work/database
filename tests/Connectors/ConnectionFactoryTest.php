<?php

namespace Bosnadev\DatabaseTests\Connectors;

use Bosnadev\Database\Connectors\ConnectionFactory;
use Bosnadev\Database\PostgresConnection;
use Bosnadev\DatabaseTests\BaseTestCase;
use Illuminate\Container\Container;
use Mockery;
use PDO;

class ConnectionFactoryTest extends BaseTestCase
{
    public function testMakeCallsCreateConnection(): void
    {
        $pgConfig = [
            'driver' => 'pgsql',
            'prefix' => 'prefix',
            'database' => 'database',
            'name' => 'foo',
        ];

        $pdo = new DatabaseConnectionFactoryPDOStub();

        $factory = Mockery::mock(ConnectionFactory::class, [new Container()])->makePartial();

        $factory->shouldAllowMockingProtectedMethods();

        $conn = $factory->createConnection(
            'pgsql',
            $pdo,
            'database',
            'prefix',
            $pgConfig
        );

        $this->assertInstanceOf(PostgresConnection::class, $conn);
    }
}

/** Why is this here? Can't we just use \PDO instead of this class? */
class DatabaseConnectionFactoryPDOStub extends PDO
{
    public function __construct()
    {
        // Nothing here.
    }
}
