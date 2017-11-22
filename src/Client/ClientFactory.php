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

namespace AmericanExpress\HyperledgerFabricClient\Client;

use AmericanExpress\HyperledgerFabricClient\Channel\ChannelManager;
use AmericanExpress\HyperledgerFabricClient\Config\ClientConfigInterface;
use AmericanExpress\HyperledgerFabricClient\EndorserClientManager;
use AmericanExpress\HyperledgerFabricClient\HashAlgorithm;
use AmericanExpress\HyperledgerFabricClient\Signatory\MdanterEccSignatory;

class ClientFactory
{
    /**
     * @param ClientConfigInterface $config
     * @return ClientInterface
     * @throws \AmericanExpress\HyperledgerFabricClient\Exception\RuntimeException
     * @throws \AmericanExpress\HyperledgerFabricClient\Exception\InvalidArgumentException
     */
    public static function fromConfig(ClientConfigInterface $config): ClientInterface
    {
        $signatory = new MdanterEccSignatory(new HashAlgorithm($config->getHashAlgorithm()));

        $channels = new ChannelManager($config);

        $endorserClients = new EndorserClientManager();

        return new Client($signatory, $channels, $endorserClients);
    }
}