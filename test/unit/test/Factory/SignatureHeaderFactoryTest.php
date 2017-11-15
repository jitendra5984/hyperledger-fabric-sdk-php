<?php
declare(strict_types=1);

namespace AmericanExpressTest\HyperledgerFabricClient\Factory;

use AmericanExpress\HyperledgerFabricClient\Factory\SerializedIdentityFactory;
use AmericanExpress\HyperledgerFabricClient\Factory\SignatureHeaderFactory;
use Hyperledger\Fabric\Protos\Common\SignatureHeader;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AmericanExpress\HyperledgerFabricClient\Factory\SignatureHeaderFactory
 */
class SignatureHeaderFactoryTest extends TestCase
{
    public function testCreate()
    {
        $serializedIdentity = SerializedIdentityFactory::fromBytes('FooBar', 'FizBuz');

        $result = SignatureHeaderFactory::create($serializedIdentity, '78erw87vxj7842jf');

        self::assertInstanceOf(SignatureHeader::class, $result);
        self::assertSame("\nFooBarFizBuz", $result->getCreator());
        self::assertSame('78erw87vxj7842jf', $result->getNonce());
    }
}
