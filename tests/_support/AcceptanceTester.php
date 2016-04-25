<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    function test_login($I)
    {
         // if snapshot exists - skipping login
         // logging in
         $I->amOnPage('');
         $I->fillField('name', 'Henkilö 2');
         $I->fillField('password', 'test');
         $I->click('Login');
         // saving snapshot
    }
   /**
    * Define custom actions here
    */
}
