<?php
declare(strict_types=1);
require __DIR__ . "/../TableWrapperInterface/TableWrapperInterface.php";
class UserTableWrapper implements TableWrapperInterface
{
  private array $rows;

  /**
   * @param array|[column => row_value] $values
   */
  public function insert(array $values): void
  {
    $this->rows[] = $values;
  }

  public function update(int $id, array $values): array
  {
    $this->rows[$id] = $values;
    return $this->rows[$id];
  }

  public function delete(int $id): void
  {
    array_splice($this->rows, $id, 1);
  }

  public function get(): array
  {
    return $this->rows;
  }
}