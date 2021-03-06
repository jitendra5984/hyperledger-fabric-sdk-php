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

namespace AmericanExpress\HyperledgerFabricClient\EndorserClient;

use AmericanExpress\HyperledgerFabricClient\ProtoFactory\EndorserClientFactory;
use Hyperledger\Fabric\Protos\Peer\EndorserClient;

final class EndorserClientManager implements EndorserClientManagerInterface
{
    /**
     * @var EndorserClient[]
     */
    private $instances = [];

    /**
     * @param string $host
     * @return EndorserClient
     */
    public function get(string $host): EndorserClient
    {
        if (!\array_key_exists($host, $this->instances)) {
            $this->instances[$host] = EndorserClientFactory::fromInsecureChannelCredentials($host);
        }

        return $this->instances[$host];
    }
}
