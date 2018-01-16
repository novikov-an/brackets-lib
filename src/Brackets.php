<?php

namespace AlexNovikov;

/**
 * Class Brackets
 *
 * @package AlexNovikov
 */
class Brackets
{
    /**
     * Checking provided string to the correct brackets placement
     *
     * @param string $str - Checking string
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function check(string $str)
    {
        if (!$this->validArguments($str)) {
            throw new \InvalidArgumentException('Invalid Arguments has been sent');
        }
        
        return !$this->removeCorrectBrackets($str);
    }
    
    /**
     * Remove correct used brackets "()" - opened and closed from the string (recursive)
     *
     * @param  string $str - Brackets string
     * @return string $new - Handled string after cutting correct brackets
     */
    public function removeCorrectBrackets($str)
    {
        $oldLength = strlen($str);
        $new = str_replace('()', '', $str);
        
        if ($oldLength != strlen($new)) {
            return $this->removeCorrectBrackets($new);
        }
        
        return $new;
    }
    
    /**
     * Does string has only correct characters
     *
     * @param  string $str - Validation string
     * @return bool        - Is validation is successful
     */
    public function validArguments($str)
    {
        $re = '/([(]|[)]|[ ]|[\\\\r]|[\\\\n]|[\\\\t])/';
        $new = preg_replace($re, '', $str);
        
        return empty($new);
    }
}