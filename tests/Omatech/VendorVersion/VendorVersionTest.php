<?php

declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Omatech\VendorVersion\VendorVersion;

final class VendorVersionTest extends TestCase {

    public function testHello() :void
	{
        $this->assertEquals('hello', 'hello');
    }

    public function testWrongRootFolder() :void
	{
        $vv = new VendorVersion();
        $res=$vv->init(__DIR__);
        $this->assertEquals($res, false);
	}

	public function testIsInstalled() :void
	{
        $vv = new VendorVersion();
        $vv->init(__DIR__.'/../../..');
        $res=$vv->isInstalled('phpunit/phpunit');
        $this->assertEquals($res, true);
    }
    
    public function testCheckMinVersion() :void
    {
        $vv = new VendorVersion();
        $vv->init(__DIR__.'/../../..');
        $res=$vv->checkMinVersion('phpunit/phpunit', '8');
        $this->assertEquals($res, true);        
    }

    public function testCheckMinVersionExact() :void
    {
        $vv = new VendorVersion();
        $vv->init(__DIR__.'/../../..');
        $res=$vv->checkMinVersion('phpunit/phpunit', '8.4.3');
        $this->assertEquals($res, true);        
    }    
    
    public function testCheckMinVersionTooNew() :void
    {
        $vv = new VendorVersion();
        $vv->init(__DIR__.'/../../..');
        $res=$vv->checkMinVersion('phpunit/phpunit', '15.9');
        $this->assertEquals($res, false);        
    }

    public function testGetVersion() :void
    {
        $vv = new VendorVersion();
        $vv->init(__DIR__.'/../../..');
        $res=$vv->getVersion('phpunit/phpunit');
        $this->assertEquals($res, '8.4.3');        
    }            
    
}
