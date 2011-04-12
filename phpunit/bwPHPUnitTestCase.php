<?php

require_once( 'PHPUnit/Autoload.php' );

/**
 * bwPHPUnitTestCase is the super class for all unit 
 * tests using PHPUnit.
 *
 * @package bwtest
 * @author	Will James <will@tekimaki.com>
 */
abstract class bwPHPUnitTestCase 
	extends PHPUnit_Framework_TestCase
{
	protected $_shell_script = TRUE;

	protected $_init_system = TRUE;

	/**
	 * Dev hook for custom "setUp" stuff
	 * Overwrite it in your test class, if you have to execute stuff before a test is called.
	 */
	protected function _start()
	{
	}

	/**
	 * Please do not touch this method and use _start directly!
	 */
	public function setUp()
	{
		// if this is a shellscript setup for it
		if( $this->_shell_script ){
			global $gShellScript;
			$gShellScript = TRUE;

			$_SERVER["SERVER_NAME"] = '';

			// reduce feedback for command line to keep log noise way down
			define( 'BIT_PHP_ERROR_REPORTING', E_ALL ^ E_NOTICE ^ E_WARNING );
		}

		// initialize the cms
		if( $this->_init_system ){
			chdir( dirname( __FILE__ ) );
			require_once( '../../kernel/setup_inc.php' );
		}

		// invoke implemented setup
		$this->_start();
	}
}
