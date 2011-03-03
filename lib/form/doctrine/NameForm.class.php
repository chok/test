<?php

/**
 * Name form.
 *
 * @package    test
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
class NameForm extends BaseNameForm
{
  const REDIRECT_NAME = 'Anna';
  
  public function configure()
  {
    $this->setWidget('name', new sfWidgetFormInputText());
    $this->setValidator('name', new sfValidatorStringNotLowercase());
  }
}
