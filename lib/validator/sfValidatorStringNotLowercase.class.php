<?php
class sfValidatorStringNotLowercase extends sfValidatorString
{
  public function configure($options = array(), $messages = array())
  {
    $this->addMessage('lowercase', '"%value%" is in lowercase.');
  }
  
  public function doClean($value)
  {
    $clean = parent::doClean($value);
    
    if (strtolower($clean) == $clean)
    {
      throw new sfValidatorError($this, 'lowercase', array('value' => $value));
    }
    
    return $clean;
  }
}
