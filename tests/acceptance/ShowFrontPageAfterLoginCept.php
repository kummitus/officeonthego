<?php

$I = new AcceptanceTester($scenario);
$I->test_login($I);
$I->wantTo('See initial form');
$I->see('task');
$I->see('date');

?>
