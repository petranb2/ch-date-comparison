<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

/**
 * Class CustomDateTimeTest
 */
final class CustomDateTimeTest extends TestCase
{

    /**
     * @dataProvider validStringsProvider
     */
    public function testStringIsValid($string): void
    {
        $this->assertEquals(true, true);

    }

    /**
     * @return string[][]
     */
    public function validStringsProvider(): array
    {
        return [
            ['(asfd(s))'],
            ['(asfd{sdf}gfg[sdf]sdf)'],
            ['asdf(fd[asfdsfd{safdsfd}svcxwe]wqsdf)asdf']
        ];
    }
}