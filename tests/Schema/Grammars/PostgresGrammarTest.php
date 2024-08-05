<?php

namespace Bosnadev\DatabaseTests\Schema\Grammars;

use Bosnadev\Database\Schema\Blueprint;
use Bosnadev\Database\PostgresConnection;
use Bosnadev\Database\Schema\Grammars\PostgresGrammar;
use Bosnadev\DatabaseTests\BaseTestCase;
use Mockery;

class PostgresGrammarTest extends BaseTestCase
{
    public function testAddingGinIndex(): void
    {
        $blueprint = new Blueprint('test');
        $blueprint->gin('foo');
        $statements = $blueprint->toSql($this->getConnection(), $this->getGrammar());

        $this->assertCount(1, $statements);
        $this->assertStringContainsString('CREATE INDEX', $statements[0]);
        $this->assertStringContainsString('GIN("foo")', $statements[0]);
    }
    
    public function testAddingGistIndex(): void
    {
        $blueprint = new Blueprint('test');
        $blueprint->gist('foo');
        $statements = $blueprint->toSql($this->getConnection(), $this->getGrammar());

        $this->assertCount(1, $statements);
        $this->assertStringContainsString('CREATE INDEX', $statements[0]);
        $this->assertStringContainsString('GIST("foo")', $statements[0]);
    }

    public function testAddingCharacter(): void
    {
        $blueprint = new Blueprint('test');
        $blueprint->character('foo', 14);
        $statements = $blueprint->toSql($this->getConnection(), $this->getGrammar());

        $this->assertCount(1, $statements);
        $this->assertStringContainsString('alter table', $statements[0]);
        $this->assertStringContainsString('add column "foo" character(14)', $statements[0]);
    }

    public function testAddingHstore(): void
    {
        $blueprint = new Blueprint('test');
        $blueprint->hstore('foo');
        $statements = $blueprint->toSql($this->getConnection(), $this->getGrammar());

        $this->assertCount(1, $statements);
        $this->assertStringContainsString('alter table', $statements[0]);
        $this->assertStringContainsString('add column "foo" hstore', $statements[0]);
    }

    public function testAddingUuid(): void
    {
        $blueprint = new Blueprint('test');
        $blueprint->uuid('foo');
        $statements = $blueprint->toSql($this->getConnection(), $this->getGrammar());

        $this->assertCount(1, $statements);
        $this->assertStringContainsString('alter table', $statements[0]);
        $this->assertStringContainsString('add column "foo" uuid', $statements[0]);
    }

    public function testAddingJsonb(): void
    {
        $blueprint = new Blueprint('test');
        $blueprint->jsonb('foo');
        $statements = $blueprint->toSql($this->getConnection(), $this->getGrammar());

        $this->assertCount(1, $statements);
        $this->assertStringContainsString('alter table', $statements[0]);
        $this->assertStringContainsString('add column "foo" jsonb', $statements[0]);
    }

    public function testAddingInt4range(): void
    {
        $blueprint = new Blueprint('test');
        $blueprint->int4range('foo');
        $statements = $blueprint->toSql(
            $this->getConnection(),
            $this->getGrammar()
        );

        $this->assertCount(1, $statements);
        $this->assertStringContainsString('alter table', $statements[0]);
        $this->assertStringContainsString('add column "foo" int4range', $statements[0]);
    }

    public function testAddingInt8range(): void
    {
        $blueprint = new Blueprint('test');
        $blueprint->int8range('foo');
        $statements = $blueprint->toSql(
            $this->getConnection(),
            $this->getGrammar()
        );

        $this->assertCount(1, $statements);
        $this->assertStringContainsString('alter table', $statements[0]);
        $this->assertStringContainsString('add column "foo" int8range', $statements[0]);
    }

    public function testAddingNumrange(): void
    {
        $blueprint = new Blueprint('test');
        $blueprint->numrange('foo');
        $statements = $blueprint->toSql(
            $this->getConnection(),
            $this->getGrammar()
        );

        $this->assertCount(1, $statements);
        $this->assertStringContainsString('alter table', $statements[0]);
        $this->assertStringContainsString('add column "foo" numrange', $statements[0]);
    }

    public function testAddingTsrange(): void
    {
        $blueprint = new Blueprint('test');
        $blueprint->tsrange('foo');
        $statements = $blueprint->toSql(
            $this->getConnection(),
            $this->getGrammar()
        );

        $this->assertCount(1, $statements);
        $this->assertStringContainsString('alter table', $statements[0]);
        $this->assertStringContainsString('add column "foo" tsrange', $statements[0]);
    }

    public function testAddingTstzrange(): void
    {
        $blueprint = new Blueprint('test');
        $blueprint->tstzrange('foo');
        $statements = $blueprint->toSql(
            $this->getConnection(),
            $this->getGrammar()
        );

        $this->assertCount(1, $statements);
        $this->assertStringContainsString('alter table', $statements[0]);
        $this->assertStringContainsString('add column "foo" tstzrange', $statements[0]);
    }

    public function testAddingDatarange(): void
    {
        $blueprint = new Blueprint('test');
        $blueprint->daterange('foo');
        $statements = $blueprint->toSql(
            $this->getConnection(),
            $this->getGrammar()
        );

        $this->assertCount(1, $statements);
        $this->assertStringContainsString('alter table', $statements[0]);
        $this->assertStringContainsString('add column "foo" daterange', $statements[0]);
    }
    
    public function testAddingTsvector(): void
    {
        $blueprint = new Blueprint('test');
        $blueprint->tsvector('foo');
        $statements = $blueprint->toSql(
            $this->getConnection(),
            $this->getGrammar()
        );
        
        $this->assertCount(1, $statements);
        $this->assertStringContainsString('alter table', $statements[0]);
        $this->assertStringContainsString('add column "foo" tsvector', $statements[0]);
    }

    protected function getConnection(): PostgresConnection
    {
        return Mockery::mock(PostgresConnection::class);
    }

    protected function getGrammar(): PostgresGrammar
    {
        return new PostgresGrammar();
    }
}
