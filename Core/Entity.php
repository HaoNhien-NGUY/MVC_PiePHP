<?php

namespace Core;

class Entity
{
    protected $params;
    private $table;

    function __construct($params = null)
    {
        $this->table = strtolower(str_replace(['Model', "\\"], '', basename(get_class($this))) . "s");
        $this->params = $params;

        if ($params != null) {
            if (array_key_exists('id', $params)) {
                $this->id = $params['id'];
                foreach ($this->read() as $key => $val) {
                    $this->$key = $val;
                }
            } else {
                foreach ($params as $key => $val) {
                    $this->$key = $val;
                }
            }
        }

        if(isset($this->id)){
            if (isset($this->relation['many'])) {
                foreach($this->relation['many'] as $rel_tab => $rel) {
                    $modelName = 'Model\\' . ucfirst(substr($rel_tab, 0, -1)) . "Model";
                    $fetch = ORM::find($rel_tab, [$rel => $this->id]);
                    foreach($fetch as $value){
                        $this->$rel_tab[] = new $modelName(['id' => $value['id']]);
                    }
                }
            }
            if (isset($this->relation['one'])) {
                $rel_one = $this->relation['one'];
                $modelName = 'Model\\' . ucfirst(substr($rel_one[0], 0, -1)) . "Model";
                $fetch = ORM::find($rel_tab, [$rel => $this->id]);
                foreach($fetch as $value){
                    $this->$rel_tab[] = new $modelName(['id' => $value['id']]);
                }
            }
            if (isset($this->relation['many_many'])) {
            }
        }

    }

    public function create()
    {
        return ORM::create($this->table, $this->params);
    }

    public function update()
    {
        return ORM::update($this->table, $this->id, $this->params);
    }

    public function delete()
    {
        return ORM::delete($this->table, $this->id);
    }

    public function read()
    {
        return ORM::read($this->table, $this->id);
    }

    public function read_all()
    {
        return ORM::find($this->table, null);
    }
}
