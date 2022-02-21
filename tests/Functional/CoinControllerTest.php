<?php

namespace Test\Unit;

use Angelo\Criptobot\Controller\CoinController;
use Angelo\Criptobot\Entity\Coin;
use Angelo\Criptobot\Helper\EntityManagerFactory;
use Doctrine\ORM\EntityManager;
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
        //Act
        $coinName = "ADA";
        $coin = new Coin($coinName);
        $coinController = new CoinController(self::$entityManager);

        //Arrange
        $coin = $coinController->create($coin);

        //Assert
        $this->assertEquals($coin->getName(),$coinName);
    }

    public function testCanGetCoin(): void
    {
        //Act
        $coinName = "ADA";
        $coin = new Coin($coinName);
        $coinController = new CoinController(self::$entityManager);

        //Arrange
        $coin = $coinController->create($coin);

        //Assert
        $this->assertEquals($coin->getName(),$coinName);
    }

    public function testCanGetCoinById(): void
    {
        //Act
        $coinName = "ADA";
        $coin = new Coin($coinName);
        $coinController = new CoinController(self::$entityManager);
        $coin = $coinController->create($coin);

        //Arrange
        $expectedCoin = $coinController->getCoin($coin->getId());

        //Assert
        $this->assertEquals($coin,$expectedCoin);
    }

    public function testCanGetCoins(): void
    {
        //Act
        $coin1 = new Coin("ADA");
        $coin2 = new Coin("BTC");
        $coin3 = new Coin("ETH");

        $coinController = new CoinController(self::$entityManager);

        $coin1 = $coinController->create($coin1);
        $coin2 = $coinController->create($coin2);
        $coin3 = $coinController->create($coin3);

        //Arrange
        $expectedArray = $coinController->coins();

        //Assert
        $this->assertNotEmpty($expectedArray);
        $this->assertContainsOnlyInstancesOf(Coin::class, $expectedArray);
    }

}