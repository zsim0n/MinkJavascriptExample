Mink Javascript Example
=======================

This is a working example from [David Winter's article](http://davidwinter.me/articles/2012/01/14/testing-javascript-websites-with-behat/) with additional explanation and updated example.

## Usage 

Clone this repo:

``` bash
git clone https://github.com/mopad/MinkJavascriptExample
```

Now install Behat, Mink, MinkExtension, PHPUnit and their dependencies with [composer](http://getcomposer.org/):

``` bash
curl http://getcomposer.org/installer | php
php composer.phar install
```

### Selenium WebDriver

You'll need to install Selenium2 to test the `@javascript` feature.
Selenium gives you ability to run `@javascript` tagged scenarios in real browser.

1. Download latest Selenium2 jar from the [Selenium website](http://seleniumhq.org/download/)

2. Download additional Web drivers if necessary 
    - [Chrome driver](http://code.google.com/p/chromedriver/downloads/list)
    - [Internet explorer](http://code.google.com/p/selenium/downloads/list)

3. Run selenium jar with:

    ``` bash
    java -jar selenium-server.jar

    Note: you can use the following additional arguments to setup the selenium-server

        - -Dwebdriver.ie.driver=IEDriverServer.exe
        - -Dwebdriver.chrome.driver=chromedriver.exe
        - -Dwebdriver.firefox.bin=firefox.exe
    ```

### Run tests

To launch Behat, just run:

``` bash
vendor/bin/behat
```

You should see an output like:

``` gherkin
Feature: Javascript support in Behat/Mink
    In order to test Javascript on a website
    As a Tester
    I can write Behat Scenarions with Javascript support
    So I can test javascript behaviour on a website

  Scenario: Open a page                         # features\twitter.bootstrap.feature:7
    Given I am on "/javascript.html"            # FeatureContext::visit()
    Then I should see "JavaScript in Bootstrap" # FeatureContext::assertPageContainsText()

  @javascript
  Scenario: Open modal dialog                   # features\twitter.bootstrap.feature:12
    Given I am on "/javascript.html#modal"      # FeatureContext::visit()
    And I should see "Live demo"                # FeatureContext::assertPageContainsText()
    When I follow "Launch demo modal"           # FeatureContext::clickLink()
    Then I should see the modal "Modal Heading" # FeatureContext::iShouldSeeTheModal()
    And I should see "Text in a modal"          # FeatureContext::assertPageContainsText()

2 scenarios (2 passed)
7 steps (7 passed)
0m8.675s
```
