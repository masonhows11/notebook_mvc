<?php


namespace App\Models\Contracts;

use Medoo\Medoo;
use PDO;

class MysqlBaseModel extends BaseModel
{

    public function __construct($id = null)
    {

        // Connect the database.
        try {
            $this->connection = new Medoo([
                // [required]
                'type' => 'mysql',
                'host' => $_ENV['DB_HOST'],
                'database' => $_ENV['DB_DATABASE'],
                'username' => $_ENV['DB_USERNAME'],
                'password' => $_ENV['DB_PASSWORD'],

                // [optional]
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_general_ci',
                'port' => 3306,

                // [optional] The table prefix. All table names will be prefixed as PREFIX_table.
                'prefix' => '',

                // [optional] To enable logging. It is disabled by default for better performance.
                'logging' => true,

                // [optional]
                // Error mode
                // Error handling strategies when the error has occurred.
                // PDO::ERRMODE_SILENT (default) | PDO::ERRMODE_WARNING | PDO::ERRMODE_EXCEPTION
                // Read more from https://www.php.net/manual/en/pdo.error-handling.php.
                'error' => PDO::ERRMODE_EXCEPTION,

                // [optional]
                // The driver_option for connection.
                // Read more from http://www.php.net/manual/en/pdo.setattribute.php.
                'option' => [
                    PDO::ATTR_CASE => PDO::CASE_NATURAL
                ],

                // [optional] Medoo will execute those commands after the database is connected.
                'command' => [
                    'SET SQL_MODE=ANSI_QUOTES'
                ]
            ]);
        } catch (\PDOException $ex) {
            echo "an error happen during connection:" . $ex->getMessage();
        }
        //        try {
        //            $this->connection = new \PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_DATABASE']}", $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
        //            $this->connection->exec("set names utf8");
        //        } catch (\PDOException $ex) {
        //            echo "an error happen during connection:" . $ex->getMessage();
        //        }

        if (!is_null($id)) {
            return $this->find($id);
        }
    }

    public function remove(): int
    {
        $record_id = $this->{$this->primaryKey};
        return $this->delete([$this->primaryKey => $record_id]);
    }

    public function save()
    {
        // we set new value for specific properties
        // and store in attributes[] array
        // and set attributes[] array as $data for update user record
        $record_id = $this->{$this->primaryKey};
        $this->update($this->attributes, [$this->primaryKey => $record_id]);
        // after update user
        // return this current instance user
        // for access to all properties
        return $this;
    }

    public function create(array $data): int
    {
        $this->connection->insert($this->table, $data);
        return $this->connection->id();
    }

    public function find($id): object
    {
        $result = $this->connection->get($this->table, '*', [$this->primaryKey => $id]);
        if (is_null($result)) {
            return (object)null;
        } else
            foreach ($result as $item => $value) {
                $this->attributes[$item] = $value;
            }
        // $this keyword refer to an instance of current class that uses
        return $this;

    }

//    public function getAll(): array
//    {
//        return $this->connection->select($this->table, '*');
//
//    }
//
//    public function get(array $columns, array $where = []): array
//    {
//        return $this->connection->select($this->table, $columns, $where);
//    }

    public function getAll(): array
    {
        return $this->get( '*',[]);

    }

    public function get($columns, array $where ): array
    {
        $page = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1 ;
        $start = ($page - 1)* $this->pageSize;
        $where['LIMIT'] = [$start,$this->pageSize];

        return $this->connection->select($this->table, $columns, $where);
    }

    public function update(array $data, array $where): int
    {
        $result = $this->connection->update($this->table, $data, $where);
        return $result->rowCount();
    }

    public function delete(array $where): int
    {
        $result = $this->connection->delete($this->table, $where);
        return $result->rowCount();
    }

    public function count(array $where):int
    {
        return $this->connection->count($this->table,$where);
    }

    public function sum($column,array $where):int
    {
        return $this->connection->sum($this->table,$column,$where);
    }
}