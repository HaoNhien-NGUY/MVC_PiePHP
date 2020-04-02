<?php

namespace Core;

class Entity
{
    private $params;
    private $table;

    function __construct($params = null)
    {
        $this->table = strtolower(str_replace(['Model', "\\"], '', basename(get_class($this))) . "s");
        $this->params = $params;

        if (array_key_exists('id', $params)) {
            $this->id = $params['id'];
            foreach($this->read() as $key => $val){
                $this->$key = $val;
            }
        } else {
            foreach ($params as $key => $val) {
                $this->$key = $val;
            }
        }

        var_dump($this->table);
    }

    public function create()
    {
        return ORM::create($this->table, $this->params);
    }

    public function update()
    {
        return ORM::update($this->table, $this->id, $this->params);
    }

    public function read()
    {
        return ORM::find($this->table, $this->id);
    }

    public function read_all()
    {
        return ORM::find($this->table, null);
    }
}
