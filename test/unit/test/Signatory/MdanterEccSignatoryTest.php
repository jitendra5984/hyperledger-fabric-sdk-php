<?php
declare(strict_types=1);

namespace AmericanExpressTest\HyperledgerFabricClient\Signatory;

use AmericanExpress\HyperledgerFabricClient\ChannelContext;
use AmericanExpress\HyperledgerFabricClient\Nonce\NonceGeneratorInterface;
use AmericanExpress\HyperledgerFabricClient\ProtoFactory\ChaincodeProposalPayloadFactory;
use AmericanExpress\HyperledgerFabricClient\ProtoFactory\ChannelHeaderFactory;
use AmericanExpress\HyperledgerFabricClient\ProtoFactory\HeaderFactory;
use AmericanExpress\HyperledgerFabricClient\ProtoFactory\ProposalFactory;
use AmericanExpress\HyperledgerFabricClient\ProtoFactory\TimestampFactory;
use AmericanExpress\HyperledgerFabricClient\Signatory\MdanterEccSignatory;
use AmericanExpress\HyperledgerFabricClient\Transaction\TransactionContextFactory;
use AmericanExpress\HyperledgerFabricClient\Transaction\TxIdFactory;
use Hyperledger\Fabric\Protos\Peer\Proposal;
use Hyperledger\Fabric\Protos\Peer\SignedProposal;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamFile;
use PHPUnit\Framework\TestCase;

/**
 * @covers \AmericanExpress\HyperledgerFabricClient\Signatory\MdanterEccSignatory
 */
class MdanterEccSignatoryTest extends TestCase
{
    /**
     * @var vfsStreamFile
     */
    private $privateKey;

    /**
     * @var MdanterEccSignatory
     */
    private $sut;

    protected function setUp()
    {
        $files = vfsStream::setup('test');

        $this->privateKey = vfsStream::newFile('foo');
        $this->privateKey->setContent(<<<'TAG'
-----BEGIN PRIVATE KEY-----
MIGHAgEAMBMGByqGSM49AgEGCCqGSM49AwEHBG0wawIBAQQghnA7rdgbZi/wndus
iXjyf0KgE6OKZjQ+5INjwelRAC6hRANCAASb3u+hY+U/FZvhYDN6d08HJ1v56UJU
yz/n2NHyJgTg6kC05AaJMeGIinEF0JeJtRDNVQGzoQJQYjnzUTS9FvGh
-----END PRIVATE KEY-----
TAG
        );
        $files->addChild($this->privateKey);

        $this->sut = new MdanterEccSignatory();
    }

    public function testSignProposal()
    {
        $result = $this->sut->signProposal(new Proposal(), new \SplFileObject($this->privateKey->url()));

        self::assertInstanceOf(SignedProposal::class, $result);
        self::assertInternalType('string', $result->getProposalBytes());
        self::assertEmpty($result->getProposalBytes());
        self::assertInternalType('string', $result->getSignature());
        self::assertNotEmpty($result->getSignature());
    }

    /**
     * @covers       \AmericanExpress\HyperledgerFabricClient\Signatory\MdanterEccSignatory::getS
     * @dataProvider dataGetS
     * @param string $dateTime
     * @param string $encodedProposalBytes
     * @param string $encodedSignature
     */
    public function testGetS(string $dateTime, string $encodedProposalBytes, string $encodedSignature)
    {
        $transactionContextFactory = new TransactionContextFactory(
            new class implements NonceGeneratorInterface {
                public function generateNonce(): string
                {
                    return 'u23m5k4hf86j';
                }
            },
            new TxIdFactory()
        );
        $channelContext = new ChannelContext([
            'mspId' => '1234',
            'adminCerts' => new \SplFileObject($this->privateKey->url()),
        ]);
        $transactionContext = $transactionContextFactory->fromChannelContext($channelContext);
        $channelHeader = ChannelHeaderFactory::create(
            $transactionContext,
            'MyChannelId',
            'MyChaincodePath',
            'MyChaincodeName',
            'MyChaincodeVersion',
            3,
            1,
            TimestampFactory::fromDateTime(new \DateTime($dateTime))
        );
        $header = HeaderFactory::fromTransactionContext($transactionContext, $channelHeader);
        $chaincodeProposalPayload = ChaincodeProposalPayloadFactory::fromChaincodeInvocationSpecArgs([]);
        $proposal = ProposalFactory::create($header, $chaincodeProposalPayload);

        $result = $this->sut->signProposal($proposal, new \SplFileObject($this->privateKey->url()));

        self::assertInstanceOf(SignedProposal::class, $result);
        self::assertEquals($encodedProposalBytes, base64_encode($result->getProposalBytes()));
        self::assertEquals($encodedSignature, base64_encode($result->getSignature()));
    }

    public function dataGetS()
    {
        $contents = file_get_contents(__DIR__ . '/data-get-s.json');

        $json = json_decode($contents, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException(json_last_error_msg(), json_last_error());
        }

        return $json;
    }
}