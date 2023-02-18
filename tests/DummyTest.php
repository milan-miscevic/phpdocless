<?php

declare(strict_types=1);

namespace Mmm\PhpDocLess\Tests;

use Mmm\PhpDocLess\Dummy;
use PHPUnit\Framework\TestCase;

class DummyTest extends TestCase
{
    public function testSample(): void
    {
        $this->assertSame(3, Dummy::sum(1, 2));
    }
}
