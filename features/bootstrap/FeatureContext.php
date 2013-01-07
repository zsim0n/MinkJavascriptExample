<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

use Behat\MinkExtension\Context\MinkContext;

//
// Require 3rd-party libraries here:
//
   require_once 'PHPUnit/Framework/Assert/Functions.php';

/**
 * Features context.
 */
class FeatureContext extends MinkContext

{
    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        // Initialize your context here
    }

    public function jqueryWait($duration = 1000)
    {
        $this->getSession()->wait($duration, '');
    }

    /**
     * @Then /^I should see the modal "([^"]*)"$/
     */
    public function iShouldSeeTheModal($arg1)
    {
        $this->jqueryWait(4000);
        $this->assertElementContainsText('#myModal h3', $arg1);
        assertTrue($this->getSession()->getPage()->find('css', '#myModal')->isVisible());
    }

}
