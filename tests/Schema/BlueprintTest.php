<?php

namespace Bosnadev\DatabaseTests\Schema;

use Bosnadev\Database\Schema\Blueprint;
use Bosnadev\DatabaseTests\BaseTestCase;
use Mockery;

class BlueprintTest extends BaseTestCase
{
    protected Blueprint $blueprint;

    public function setUp(): void
    {
        parent::setUp();

        $this->blueprint = Mockery::mock(Blueprint::class)
            ->makePartial();
    }

    public function testGinIndex(): void
    {
        $this->blueprint
            ->shouldAllowMockingProtectedMethods()
            ->shouldReceive('indexCommand')
            ->with('gin', 'col', 'myName');

        $this->blueprint->gin('col', 'myName');
    }
    
    public function testGistIndex(): void
    {
        $this->blueprint
            ->shouldAllowMockingProtectedMethods()
            ->shouldReceive('indexCommand')
            ->with('gist', 'col', 'myName');

        $this->blueprint->gist('col', 'myName');
    }

    public function testCharacter(): void
    {
        $this->blueprint
            ->shouldReceive('addColumn')
            ->with('character', 'col', 14);

        $this->blueprint->character('col', 14);
    }

    public function testHstore(): void
    {
        $this->blueprint
            ->shouldReceive('addColumn')
            ->with('hstore', 'col');

        $this->blueprint->hstore('col');
    }

    public function testUuid(): void
    {
        $this->blueprint
            ->shouldReceive('addColumn')
            ->with('uuid', 'col');

        $this->blueprint->uuid('col');
    }

    public function testJsonb(): void
    {
        $this->blueprint
            ->shouldReceive('addColumn')
            ->with('jsonb', 'col');

        $this->blueprint->jsonb('col');
    }

    public function testInt4range(): void
    {
        $this->blueprint
            ->shouldReceive('addColumn')
            ->with('int4range', 'col');

        $this->blueprint->int4range('col');
    }

    public function testInt8range(): void
    {
        $this->blueprint
            ->shouldReceive('addColumn')
            ->with('int8range', 'col');

        $this->blueprint->int8range('col');
    }

    public function testNumrange(): void
    {
        $this->blueprint
            ->shouldReceive('addColumn')
            ->with('numrange', 'col');

        $this->blueprint->numrange('col');
    }

    public function testTsrange(): void
    {
        $this->blueprint
            ->shouldReceive('addColumn')
            ->with('tsrange', 'col');

        $this->blueprint->tsrange('col');
    }

    public function testTstzrange(): void
    {
        $this->blueprint
            ->shouldReceive('addColumn')
            ->with('tstzrange', 'col');

        $this->blueprint->tstzrange('col');
    }
}
