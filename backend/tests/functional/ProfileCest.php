<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\UserFixture;

/**
 * @Class ProfileCest
 */
class ProfileCest
{
    /**
     * Load fixtures before db transaction begin
     * Called in _before()
     * @see \Codeception\Module\Yii2::_before()
     * @see \Codeception\Module\Yii2::loadFixtures()
     * @return array
     */
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ]
        ];
    }
    
    /**
     * @param FunctionalTester $I
     */
    public function pageTest(FunctionalTester $I)
    {
        $I->amOnPage('/site/profile');
        $I->dontSee('Здесь будет ваш профиль','span');
        $I->amLoggedInAs(1);
        $I->amOnPage('/site/profile');
        $I->see('Здесь будет ваш профиль','span');
    }
}
