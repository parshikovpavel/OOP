<?php
class ValueSerializable implements Serializable
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function serialize()
    {
        return json_encode(["value" => $this->value]);
    }

    public function unserialize($searilized)
    {
        $data = json_decode($searilized, true);
        $this->value = $data['value'];
    }
}

$obj = new ValueSerializable(123);

$str = serialize($obj);

var_dump($str);

$newobj = unserialize($str);

var_dump($newobj);



