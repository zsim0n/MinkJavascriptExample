Feature: Javascript support in Behat/Mink
  In order to test Javascript on a website
  As a Tester
  I can write Behat Scenarions with Javascript support
  So I can test javascript behaviour on a website

  Scenario: Open a page
    Given I am on "/javascript.html"
    Then I should see "JavaScript in Bootstrap"

  @javascript
  Scenario: Open modal dialog
    Given I am on "/javascript.html#modal"
      And I should see "Live demo"
    When I follow "Launch demo modal"
    Then I should see the modal "Modal Heading"
      And I should see "Text in a modal"
