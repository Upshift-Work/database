<?php

namespace Bosnadev\DatabaseTests;

use Bosnadev\Database\PostgresConnection;
use Doctrine\DBAL\Driver\AbstractPostgreSQLDriver as Driver;
use Mockery;

class PostgresConnectionTest extends BaseTestCase
{
    public function testReturnsDoctrineDriver(): void
    {
        $conn = Mockery::mock(PostgresConnection::class)->makePartial();

        $this->assertInstanceOf(Driver::class, $conn->getDoctrineDriver());
    }
}
