<?php

namespace Core;

class Entity
{
    public $params;
    private $table;
    public $exists;

    function __construct($params = null)
    {
        $this->table = strtolower(str_replace(['Model', "\\"], '', basename(get_class($this))) . "s");
        $this->params = $params;

        if ($params != null) {
            if (array_key_exists('id', $params)) {
                $this->id = $params['id'];
                if($fetch = $this->read()) {
                    $this->exists = true;
                    foreach ($fetch as $key => $val) {
                        $this->$key = $val;
                    }
                } else {
                    $this->exists = false;
                }
            } else {
                foreach ($params as $key => $val) {
                    $this->$key = $val;
                }
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
        return ORM::read($this->table, ['id' => $this->id]);
    }

    public function read_all()
    {
        return ORM::find($this->table, null);
    }

    public function exists($cond)
    {
        return ORM::read($this->table, $cond);
    }

    //dynamically "create" get methods (getArticles...)
    public function __call($method, $arguments)
    {
        if (substr($method, 0, 3) == 'get' && isset($this->id)) {
            $rel_tab = lcfirst(substr($method, 3));
            if (isset($this->relation['many'][$rel_tab])) {
                $this->setInstanceMany($rel_tab, $this->relation['many'][$rel_tab]);
                return true;
            } else if (isset($this->relation['many_many'][$rel_tab])) {
                $this->setInstanceManyMany($rel_tab, $this->relation['many_many'][$rel_tab]);
                return true;
            } else if (isset($this->relation['one'][$rel_tab])) {
                $this->setInstanceOne($rel_tab, $this->relation['one'][$rel_tab]);
                return true;
            }
        }
        return false;
    }

    private function setInstanceMany($rel_tab, $rel)
    {
        $modelName = 'Model\\' . ucfirst(substr($rel_tab, 0, -1)) . "Model";
        $fetch = ORM::find($rel_tab, [$rel => $this->id]);
        foreach ($fetch as $value) {
            $this->$rel_tab[] = new $modelName(['id' => $value['id']]);
        }
    }

    private function setInstanceManyMany($rel_tab, $pivot_rel)
    {
        $modelName = 'Model\\' . ucfirst(substr($rel_tab, 0, -1)) . "Model";
        $fetch = ORM::find($pivot_rel['pivot'], [$pivot_rel['rel_pivot'] => $this->id]);
        foreach ($fetch as $fetch_res) {
            $this->$rel_tab[] = new $modelName(['id' => $fetch_res[$pivot_rel['rel']]]);
        }
    }

    private function setInstanceOne($rel_tab, $rel)
    {
        $modelName = 'Model\\' . ucfirst(substr($rel_tab, 0, -1)) . "Model";
        $this->$rel_tab = new $modelName(['id' => $this->$rel]);
    }
}
