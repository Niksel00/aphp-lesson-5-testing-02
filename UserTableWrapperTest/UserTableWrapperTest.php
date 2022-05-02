<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require __DIR__ . "/../UserTableWrapper/UserTableWrapper.php";
require_once '../vendor/autoload.php';

class UserTableWrapperTest extends TestCase
{
  /**
   *@dataProvider providerInsert
   */
  public function testInsert($a, $b, $c): void
  {
    $table = new UserTableWrapper();
    $table->insert($a);
    $table->insert($b);
    $table->insert($c);
    $arr = $table->get();
    self::assertEquals([$a, $b, $c], $arr);
  }

  public function providerInsert(): array
  {
    return [
      [['Bob'], ['John'], ['Nick']]
    ];
  }

  /**
   *@dataProvider providerUpdate
   */
  public function testUpdate($a, $b): void
  {
    $table = new UserTableWrapper();
    $table->insert($a);
    $data = $table->update(0, $b);
    self::assertEquals($b, $data);
  }

  public function providerUpdate(): array
  {
    return [
      [[1,2,3,'Hello!'], ['Hello world!']]
    ];
  }

  /**
   *@dataProvider providerDelete
   */
  public function testDelete($a, $b): void
  {
    $table = new UserTableWrapper();
    $table->insert($a);
    $table->delete(0);
    $arr = $table->get();
    self::assertEquals($b, $arr);
  }

  public function providerDelete(): array
  {
    return [
      [[1,2,3,'Hello!'], []]
    ];
  }

  /**
   *@dataProvider providerGet
   */
  public function testGet($a): void
  {
    $table = new UserTableWrapper();
    $table->insert($a);
    $arr = $table->get();
    self::assertEquals([$a], $arr);
  }

  public function providerGet(): array
  {
    return [
      [[1,2,3,'Hello!']]
    ];
  }
}