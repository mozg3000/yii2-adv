<?php namespace frontend\tests;

use frontend\models\SignupForm;

class FirstTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $model = new SignupForm();
        $model->setAttributes(['username'=>'admin', 'email'=>'test@mail.ru']);

        $this->tester->assertEquals('admin', $model->username);

        expect($model->validate())->false();

        $model->password = 'sfsrgew';

        expect($model->validate())->true();
    }
}