<?php


namespace Twilio;


class Values implements \ArrayAccess {
    public const NONE = 'Twilio\\Values\\NONE';
    public const ARRAY_NONE = [self::NONE];
    public const INT_NONE = 0;
    public const BOOL_NONE = false;
    protected $options;
    private static $noneConstants = array(self::NONE, self::ARRAY_NONE, self::INT_NONE, self::BOOL_NONE);

    public static function array_get(array $array, string $key, string $default = null) {
        if (\array_key_exists($key, $array)) {
            return $array[$key];
        }
        return $default;
    }

    public static function of(array $array): array {
        $result = [];
        foreach ($array as $key => $value) {
            if (!in_array($value, self::$noneConstants, true)) {
                $result[$key] = $value;
            }
        }
        return $result;
    }

    public function __construct(array $options) {
        $this->options = [];
        foreach ($options as $key => $value) {
            $this->options[\strtolower($key)] = $value;
        }
    }

    public function offsetExists($offset): bool {
        return true;
    }


    #[\ReturnTypeWillChange]
    public function offsetGet($offset) {
        $offset = \strtolower($offset);
        return \array_key_exists($offset, $this->options) ? $this->options[$offset] : self::NONE;
    }


    public function offsetSet($offset, $value): void {
        $this->options[\strtolower($offset)] = $value;
    }

    public function offsetUnset($offset): void {
        unset($this->options[$offset]);
    }
}
