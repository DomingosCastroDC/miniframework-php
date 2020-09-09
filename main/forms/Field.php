<?php
namespace app\main\forms;
use app\main\Model;
class Field
{
    public string $attribute;
    public Model $model;

    public function __construct($model,$attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString()
    {
        return sprintf('
            <div class="form-group">
                <label>%s</label>
                <input type="text" name="%s" id="" class="form-control %s" >
                <div class="invalid-feedback">
                    %s
                </div>
            </div>
        ',  $this->model->getAttributeLabels()[$this->attribute] ?? $this->attribute,
            $this->attribute,
            $this->model->hasError($this->attribute) ? 'is-invalid' : '',
            $this->model->getError($this->attribute),

        );
    }
}