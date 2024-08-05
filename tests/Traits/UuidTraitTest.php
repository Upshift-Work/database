<?php

namespace Bosnadev\DatabaseTests\Traits;

use Bosnadev\Database\Traits\UuidTrait;
use Bosnadev\DatabaseTests\BaseTestCase;
use Illuminate\Database\Eloquent\Model;

class UuidTraitTest extends BaseTestCase
{
    public function testTraitIsBooted(): void
    {
        $model = new UuidBootingModelStub();

        $this->assertTrue($model::$uuidBooted);
    }

    public function testRequiredIncrementingFalse(): void
    {
        $model = new UuidAssignsUuidStub();
        $model->_provideUuidKey();
    }

    public function testUuidAssignsUuid(): void
    {
        $model = new UuidAssignsUuidStub();

        $model->_provideUuidKey();

        $this->assertEquals(4, substr_count($model->id, '-'));
    }
}

class UuidBootingModelStub extends Model
{
    use UuidTrait;

    public static bool $uuidBooted = false;

    public static function bootUuidTrait(): void
    {
        static::$uuidBooted = true;
    }
}

class UuidAssignsUuidStub extends Model
{
    use UuidTrait;

    public $timestamps = false;
    public $incrementing = false;

    public function _provideUuidKey(): void
    {
        $this->provideUuidKey($this);
    }
}

