<?php

class LoginADCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
        $I->amOnPage("/");
        $I->see("QUẢN TRỊ VIÊN");
    }
}
