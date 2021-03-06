<?php

/**
 * Copyright 2017 American Express Travel Related Services Company, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express
 * or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

declare(strict_types=1);

namespace AmericanExpressTest\HyperledgerFabricClient;

use AmericanExpress\HyperledgerFabricClient\HashAlgorithm;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AmericanExpress\HyperledgerFabricClient\HashAlgorithm
 */
class HashAlgorithmTest extends TestCase
{
    public function testDefaultHashAlgorithm()
    {
        $sut = new HashAlgorithm();

        self::assertSame('sha256', (string) $sut);
    }

    public function testValidHashAlgorithm()
    {
        $sut = new HashAlgorithm('sha512');

        self::assertSame('sha512', (string) $sut);
    }

    /**
     * @expectedException \AmericanExpress\HyperledgerFabricClient\Exception\InvalidArgumentException
     */
    public function testInvalidHashAlgorithm()
    {
        new HashAlgorithm('InvalidAlgorithm');
    }
}
