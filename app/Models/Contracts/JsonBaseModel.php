<?php


namespace App\Models\Contracts;


class JsonBaseModel extends BaseModel
{
    private $db_path;
    private $table_file_path;

    public function __construct()
    {
        // path for user json file
        $this->db_path = BASE_PATH . "/databases/jsondb/";
        $this->table_file_path = $this->db_path . $this->table . '.json';
    }


    private function write_json(array $new_data)
    {
        // write data in to json file
        $data_json = json_encode($new_data);
        file_put_contents($this->table_file_path, (string)$data_json);
    }

    private function read_json(): array
    {
        // read data from json file
        $table_data = json_decode(file_get_contents($this->table_file_path));
        return $table_data;
    }

    public function create(array $new_date): int
    {
        $table_data = $this->read_json();
        $table_data[] = $new_date;
        $this->write_json((array)$table_data);
        return $new_date[$this->primaryKey];
    }

    public function find($id): object
    {
        $table_data = $this->read_json();
        foreach ($table_data as $row) {
            if ($row->{$this->primaryKey} == $id) {
                return $row;
            }
        }
        // cast array to object
        return (object)[];
    }

    public function getAll(): array
    {
        return $this->read_json();
    }

    public function get(array $columns, array $where): array
    {
        return [];
    }

    public function update(array $data, array $where): int
    {
        return 1;
    }

    public function delete($id, array $where): int
    {
        return 1;
    }
}