<?php

namespace Core;

class Entity
{
    protected $params;
    private $table;
    private $rel_names;

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

        if (isset($this->id)) {
            if (isset($this->relation['many'])) {
                foreach ($this->relation['many'] as $rel_tab => $rel) {
                    $this->rel_names['many'][$rel_tab] = $rel;
                }
            }
            if (isset($this->relation['one'])) {
                $rel_tab = $this->relation['one']['table'];
                $rel_id = $this->relation['one']['rel'];
                $modelName = 'Model\\' . ucfirst(substr($rel_tab, 0, -1)) . "Model";
                $this->$rel_tab = new $modelName(['id' => $this->$rel_id]);
            }
            if (isset($this->relation['many_many'])) {
                foreach ($this->relation['many_many'] as $rel_tab => $pivot_rel) {
                    $this->rel_names['many_many'][$rel_tab] = $pivot_rel;
                }
            }
        }
    }

    public function __call($method, $arguments)
    {
        $rel_tab = lcfirst(substr($method, 3));
        if (isset($this->rel_names['many']) && array_key_exists($rel_tab, $this->rel_names['many'])) {
            $rel = $this->rel_names['many'][$rel_tab];
            $modelName = 'Model\\' . ucfirst(substr($rel_tab, 0, -1)) . "Model";
            $fetch = ORM::find($rel_tab, [$rel => $this->id]);
            foreach ($fetch as $value) {
                $this->$rel_tab[] = new $modelName(['id' => $value['id']]);
            }
            return true;
        } else if (isset($this->rel_names['many_many']) && array_key_exists($rel_tab, $this->rel_names['many_many'])) {
            $pivot_rel = $this->rel_names['many_many'][$rel_tab];
            $modelName = 'Model\\' . ucfirst(substr($rel_tab, 0, -1)) . "Model";
            $fetch = ORM::find($pivot_rel['pivot'], [$pivot_rel['rel_pivot'] => $this->id]);
            foreach ($fetch as $fetch_res) {
                if (!isset($GLOBALS['rel_routes'][$rel_tab]) || !in_array($fetch_res[$pivot_rel['rel']], $GLOBALS['rel_routes'][$rel_tab])) {
                    $this->$rel_tab[] = new $modelName(['id' => $fetch_res[$pivot_rel['rel']]]);
                }
            }
            return true;
        } else {
            return false;
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
}
