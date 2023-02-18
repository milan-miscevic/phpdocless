<?php

declare(strict_types=1);

namespace Mmm\PhpDocLess\Tests;

use Mmm\PhpDocLess\Remover;
use PHPUnit\Framework\TestCase;

class RemoverTest extends TestCase
{
    public function testRemover(): void
    {
        $remover = new Remover();

        $samples = __DIR__ . DIRECTORY_SEPARATOR . 'samples';

        $in = file_get_contents($samples . DIRECTORY_SEPARATOR . 'Sample01.php');
        $out = file_get_contents($samples . DIRECTORY_SEPARATOR . 'Sample02.php');

        $this->assertSame(trim($out), trim($remover->remove($in)));
    }
}
