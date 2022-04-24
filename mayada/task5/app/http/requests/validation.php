<?php
/* error array style 

   errors : [
       "name":[
           "max":"",
           "required":"",
           etc 
       ]
   ]
*/

namespace app\http\requests;

use app\database\connections\connection;
use app\http\requests\getError;

class validation
{
    private  array $errors = [];
    private $key;
    private $value;
    public function required()
    {
        if (empty($this->value)) {
            $this->errors[$this->key][__FUNCTION__] = getError::errorMessage("{$this->key}  is required");
        }
        return $this;
    }
    public function unique($table, $column = "")
    {
        if (!($column)) {
            $column = $this->key;
        }
        $connectionObj = new connection;
        $query = "SELECT * FROM `{$table}` WHERE {$column}= ?";
        $stmt = $connectionObj->con->prepare($query);
        $stmt->bind_param('s', $this->value);
        $stmt->execute();
        if ($stmt->get_result()->num_rows == 1) {
            $this->errors[$this->key][__FUNCTION__] = getError::errorMessage("{$this->key}  is already exist ");
        }
        return $this;
    }

    public function exist($table, $column = "")
    {
        if (!($column)) {
            $column = $this->key;
        }
        $connectionObj = new connection;
        $query = "SELECT * FROM `{$table}` WHERE {$column}= ?";
        $stmt = $connectionObj->con->prepare($query);
        print_r($query);
        $stmt->bind_param('s', $this->value);
        if (!$stmt) {
            return false;
        }
        $stmt->execute();
        if ($stmt->get_result()->num_rows != 1) {
            $this->errors[$this->key][__FUNCTION__] = getError::errorMessage("{$this->key} not exist ");
        }
        return $this;
    }
    public function integer()
    {
        if (!ctype_digit($this->value)) {
            $this->errors[$this->key][__FUNCTION__] = getError::errorMessage("{$this->key} must be number type");
        }
        return $this;
    }
    public function regex($regularExpression, $message = "invalid")
    {
        if (!preg_match($regularExpression, $this->value)) {
            $this->errors[$this->key][__FUNCTION__] = getError::errorMessage("{$this->key}  {$message}");
        }
        return $this;
    }
    public function confirmed($confirmadValue)
    {
        if ($this->value != $confirmadValue) {
            $this->errors[$this->key][__FUNCTION__] = getError::errorMessage("{$this->key} confirmation must be identical to {$this->key} ");
        }
        return $this;
    }
    public function max($max)
    {
        if (strlen($this->value) > $max) {
            $this->errors[$this->key][__FUNCTION__] = getError::errorMessage("{$this->key} max character is {$max}");
        }
        return $this;
    }
    public function digits($digitsNumber)
    {
        if (strlen($this->value) != $digitsNumber) {
            $this->errors[$this->key][__FUNCTION__] = getError::errorMessage("{$this->key} must equal to {$digitsNumber} digits");
        }
        return $this;
    }

    public function in($enum)
    {
        if (!in_array($this->value, $enum)) {
            $this->errors[$this->key][__FUNCTION__] = getError::errorMessage("{$this->key} must be " . implode(',', $enum));
        }
        return $this;
    }



    /* get value of key*/
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set the value of key
     *
     * @return  self
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get the value of value
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value of value
     *
     * @return  self
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get the value of errors
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Set the value of errors
     *
     * @return  self
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;

        return $this;
    }
}
