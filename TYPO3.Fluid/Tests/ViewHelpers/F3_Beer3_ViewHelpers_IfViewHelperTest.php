<?php
declare(ENCODING = 'utf-8');
namespace F3::Beer3::ViewHelpers;

/*                                                                        *
 * This script is part of the TYPO3 project - inspiring people to share!  *
 *                                                                        *
 * TYPO3 is free software; you can redistribute it and/or modify it under *
 * the terms of the GNU General Public License version 2 as published by  *
 * the Free Software Foundation.                                          *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General      *
 * Public License for more details.                                       *
 *                                                                        */

/**
 * @package 
 * @subpackage 
 * @version $Id:$
 */
/**
 * Testcase for [insert classname here]
 *
 * @package
 * @subpackage Tests
 * @version $Id:$
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 */
class IfViewHelperTest extends F3::Testing::BaseTestCase {

	
	/**
	 * @var F3::Beer3::TemplateParser
	 */
	protected $templateParser;

	/**
	 * Sets up this test case
	 *
	 * @author Sebastian Kurfürst <sebastian@typo3.org>
	 */
	public function setUp() {
		$this->templateParser = new F3::Beer3::Core::TemplateParser();
		$this->templateParser->injectObjectFactory($this->objectFactory);
	}
	
	/**
	 * @test
	 * @author Sebastian Kurfürst <sebastian@typo3.org>
	 */
	public function ifReturnsCorrectResultIfConditionTrue() {
		$templateSource = file_get_contents(__DIR__ . '/Fixtures/IfFixture.html', FILE_TEXT);
		
		$templateTree = $this->templateParser->parse($templateSource)->getRootNode();
		$context = new F3::Beer3::Core::VariableContainer(array('condition' => 'true'));
		$result = $templateTree->render($context);
		$expected = 'RenderSomething';
		$this->assertEquals($expected, $result, 'IF did not return expected result if condition was true');	
	}
	
	/**
	 * @test
	 * @author Sebastian Kurfürst <sebastian@typo3.org>
	 */
	public function ifReturnsCorrectResultIfConditionFalse() {
		$templateSource = file_get_contents(__DIR__ . '/Fixtures/IfFixture.html', FILE_TEXT);
		
		$templateTree = $this->templateParser->parse($templateSource)->getRootNode();
		$context = new F3::Beer3::Core::VariableContainer(array('condition' => FALSE));
		$result = $templateTree->render($context);
		$expected = '';
		$this->assertEquals($expected, $result, 'IF did not return expected result if condition was false');	
	}
	
	/**
	 * @test
	 * @author Sebastian Kurfürst <sebastian@typo3.org>
	 */
	public function ifThenElseReturnsCorrectResultIfConditionTrue() {
		$templateSource = file_get_contents(__DIR__ . '/Fixtures/IfThenElseFixture.html', FILE_TEXT);
		
		$templateTree = $this->templateParser->parse($templateSource)->getRootNode();
		$context = new F3::Beer3::Core::VariableContainer(array('condition' => 'true'));
		$result = $templateTree->render($context);
		$expected = 'YEP';
		$this->assertEquals($expected, $result, 'IF-Then-Else did not return expected result if condition was true');	
	}
	
	/**
	 * @test
	 * @author Sebastian Kurfürst <sebastian@typo3.org>
	 */
	public function ifThenElseReturnsCorrectResultIfConditionFalse() {
		$templateSource = file_get_contents(__DIR__ . '/Fixtures/IfThenElseFixture.html', FILE_TEXT);
		
		$templateTree = $this->templateParser->parse($templateSource)->getRootNode();
		$context = new F3::Beer3::Core::VariableContainer(array('condition' => FALSE));
		$result = $templateTree->render($context);
		$expected = 'NOPE';
		$this->assertEquals($expected, $result, 'IF-Then-Else did not return expected result if condition was false');	
	}
}

?>