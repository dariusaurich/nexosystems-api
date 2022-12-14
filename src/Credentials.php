<?php
/*
 * Copyright (c) 2021, Bastian Leicht <mail@bastianleicht.de>
 * Copyright (c) 2022, Darius Aurich <darius.aurich@gmail.com>
 *
 * PDX-License-Identifier: BSD-2-Clause
 */

namespace NexoSystems;

use NexoSystems\Exception\ParameterException;

class Credentials
{
    private $token;
    private $sandbox;
    private $url;

    /**
     * Credentials constructor.
     * @param string $token
     * @param bool $sandbox
     */
    public function __construct(string $token, bool $sandbox = false)
    {
        if (!is_string($token)) {
            throw new ParameterException('invalid argument');
        }

        $this->token = $token;

        switch ($sandbox) {
            case false:
                $this->sandbox = false;
                $this->url = 'https://nexo.systems/api/v2/';
                break;
            case true:
                $this->sandbox = true;
                $this->url = 'none';
				die('Sandbox comming soon!');
                break;
            default:
                $this->sandbox = false;
                $this->url = 'https://nexo.systems/api/v2/';
        }
    }

    public function __toString()
    {
        return sprintf(
            '[Host: %s], [Token: %s].',
            $this->url,
            $this->token
        );
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @return bool
     */
    public function isSandbox(): bool
    {
        return $this->sandbox;
    }
}
