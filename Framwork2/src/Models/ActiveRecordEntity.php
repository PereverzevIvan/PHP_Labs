<?php
namespace Models;
use Services\Db;
abstract class ActiveRecordEntity{
    protected $id;
    
    public function getId(): int{
        return $this->id;
    }
    public function __set($name, $value){
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }
    private function underscoreToCamelCase(string $source): string{
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }
    public static function findAll(): array{
        $db = new Db();
        return $db->query('SELECT * FROM `' . static::getTableName() . '`;', [], static::class);
    }
    public static function getById(int $id): ?self{
        $db = new Db();
        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE id=:id;', [':id' => $id], static::class);
        return $entities ? $entities[0] : null;
    }

    public function save(): void{
    $mappedProperties = $this->mapPropertiesToDbFormat();
    if ($this->id !== null) {
        $this->update($mappedProperties);
    } else {
        $this->insert($mappedProperties);
    }
    }

    private function insert(array $mappedProperties): void{
        $filteredProperties = array_filter($mappedProperties);
        $columns = [];
        $paramsNames = [];
        $params2values = [];
        foreach ($filteredProperties as $columnName => $value) {
        $columns[] = '`' . $columnName. '`';
        $paramName = ':' . $columnName;
        $paramsNames[] = $paramName;
        $params2values[$paramName] = $value;
    }
    $columnsViaSemicolon = implode(', ', $columns);
    $paramsNamesViaSemicolon = implode(', ', $paramsNames);
    $sql = 'INSERT INTO ' . static::getTableName() . ' (' . $columnsViaSemicolon . ') VALUES (' . $paramsNamesViaSemicolon . ');';
    $db = new Db();
    $db->query($sql, $params2values, static::class);
    // var_dump($mappedProperties);
    }

    private function update(array $mappedProperties): void{
        $columns2params = [];
        $params2values = [];
        $index = 1;
        foreach ($mappedProperties as $column => $value) {
            $param = ':param' . $index; // :param1
            $columns2params[] = $column . ' = ' . $param; // column1 = :param1
            $params2values[$param] = $value; // [:param1 => value1]
            $index++;
        }
        $sql = 'UPDATE ' . static::getTableName() . ' SET ' . implode(', ', $columns2params) . ' WHERE id = ' . $this->id;
        $db = new Db();
        $db->query($sql, $params2values, static::class);
    }

    private function mapPropertiesToDbFormat(): array{
    $reflector = new \ReflectionObject($this);
    $properties = $reflector->getProperties();
    $mappedProperties = [];
    foreach ($properties as $property) {
        $propertyName = $property->getName();
        $propertyNameAsUnderscore = $this->camelCaseToUnderscore($propertyName);
        $mappedProperties[$propertyNameAsUnderscore] = $this->$propertyName;
    }
    return $mappedProperties;
    }

    private function camelCaseToUnderscore(string $source): string{
    return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $source));
    }
    
    public function break(){
    $db = new Db();
    $db->query('DELETE FROM `' . static::getTableName() . '` WHERE id = :id', [':id' => $this->id]);
    $this->id = null;
    }

    public static function findAllWhere(string $columnName, int $id): ?array
    {
        $db = new Db();
        return $db->query('SELECT * FROM `'.static::getTableName().'` WHERE `'.$columnName.'`=:id', [':id'=>$id], static::class);
    }

    abstract protected static function getTableName(): string;
}
    