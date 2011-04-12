<?php

require_once('./bwPHPUnitTestCase.php');

class SampleTextCase 
	extends bwPHPUnitTestCase
{
	public function testKernelIsActive()
	{
		global $gBitSystem;
		$this->assertTrue( $gBitSystem->isPackageActive('kernel') );
	}
}

