<?php
/*
 * This file is part of Aplus Framework HTTP Library.
 *
 * (c) Natan Felles <natanfelles@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Tests\HTTP;

class RequestProxyMock extends RequestMock
{
    protected function prepareInput() : void
    {
        parent::prepareInput();
        $_SERVER = [
            'HTTP_HOST' => 'real-domain.tld:8080',
            'HTTP_X_FORWARDED_FOR' => '192.168.1.2',
            'HTTP_REFERER' => 'invali_d',
            'REMOTE_ADDR' => '192.168.1.100',
            'REQUEST_METHOD' => 'GET',
            'REQUEST_SCHEME' => 'http',
            'HTTPS' => 'on',
            'REQUEST_URI' => '/blog/posts?order_by=title&order=asc',
            'SERVER_PORT' => 8080,
            'SERVER_PROTOCOL' => 'HTTP/1.1',
            'SERVER_NAME' => 'domain.tld',
        ];
    }

    protected function prepareCookies() : void
    {
        parent::prepareCookies();
        $this->removeCookie('X-CSRF-Token');
    }
}
