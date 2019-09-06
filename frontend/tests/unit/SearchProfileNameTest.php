<?php namespace frontend\tests;
use frontend\components\ProfileStorage;
use frontend\components\SearchProfileService;

class SearchProfileNameTest extends \Codeception\Test\Unit
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
        $storage = $this->getMockBuilder(ProfileStorage::class)
                        ->setMethods(['find'])->getMock();
        $storage->expects($this->once())->method('find')->with('Sergey')
                ->willReturn('Ivanov');

        $searcher = new SearchProfileService($storage);
        $name = $searcher->searchProfileName('Sergey');

        expect($name)->notNull();
        expect($name)->equals('IVANOV');
    }
}