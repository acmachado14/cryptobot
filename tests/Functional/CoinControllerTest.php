<?php

namespace Test\Unit;

use Angelo\Criptobot\Controller\CoinController;
use Angelo\Criptobot\Entity\Coin;
use Angelo\Criptobot\Helper\EntityManagerFactory;
use PHPUnit\Framework\TestCase;

class CoinControllerTest extends TestCase
{
    private static $entityManager;

    public static function setUpBeforeClass(): void
    {
        $entityManagerFactory = new EntityManagerFactory();
        self::$entityManager = $entityManagerFactory->getEntityManager();
    }

    protected function setUp(): void
    {
        self::$entityManager->getConnection()->beginTransaction();
    }

    protected function tearDown(): void
    {
        self::$entityManager->getConnection()->rollBack();
    }

    public function testCanCreateCoin(): void
    {
        //Arrange
        $coinName = "ADA";
        $coin = new Coin($coinName);
        $coinController = new CoinController(self::$entityManager);

        //Act
        $coin = $coinController->create($coin);

        //Assert
        $this->assertEquals($coin->getName(),$coinName);
    }

    public function testCanGetCoinById(): void
    {
        //Arrange
        $coinName = "ADA";
        $coin = new Coin($coinName);
        $coinController = new CoinController(self::$entityManager);
        $coin = $coinController->create($coin);

        //Act
        $expectedCoin = $coinController->getCoin($coin->getId());

        //Assert
        $this->assertEquals($coin,$expectedCoin);
    }

    public function testCanGetCoins(): void
    {
        //Arrange
        $coin1 = new Coin("ADA");
        $coin2 = new Coin("BTC");
        $coin3 = new Coin("ETH");

        $coinController = new CoinController(self::$entityManager);

        $coin1 = $coinController->create($coin1);
        $coin2 = $coinController->create($coin2);
        $coin3 = $coinController->create($coin3);

        //Act
        $expectedArray = $coinController->coins();

        //Assert
        $this->assertNotEmpty($expectedArray);
        $this->assertContainsOnlyInstancesOf(Coin::class, $expectedArray);
    }

}