<?php
declare(strict_types=1);

namespace AmericanExpressTest\HyperledgerFabricClient\Factory;

use AmericanExpress\HyperledgerFabricClient\Factory\ChaincodeSpecFactory;
use Hyperledger\Fabric\Protos\Peer\ChaincodeInput;
use Hyperledger\Fabric\Protos\Peer\ChaincodeSpec;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AmericanExpress\HyperledgerFabricClient\Factory\ChaincodeSpecFactory
 */
class ChaincodeSpecFactoryTest extends TestCase
{
    public function testFromArgs()
    {
        $result = ChaincodeSpecFactory::fromArgs([
            'foo',
            'bar',
        ]);

        self::assertInstanceOf(ChaincodeSpec::class, $result);

        $chaincodeInput = $result->getInput();
        self::assertInstanceOf(ChaincodeInput::class, $chaincodeInput);
        self::assertSame(['foo', 'bar'], iterator_to_array($chaincodeInput->getArgs()));
    }
}
