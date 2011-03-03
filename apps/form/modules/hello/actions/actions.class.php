<?php

/**
 * hello actions.
 *
 * @package    test
 * @subpackage hello
 * @author     Your name here
 * @version    SVN: $Id$
 */
class helloActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->form = new NameForm();

    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter($this->form->getName()));
      if ($this->form->isValid())
      {
        if ($this->form->getValue('name') == NameForm::REDIRECT_NAME)
        {
          $this->redirect('@hello_list');
        }
        else
        {
          $this->form->save();
          
          $this->redirect('@hello_hello?id='.$this->form->getObject()->getId());
        }
      }
    }
  }
  
  public function executeHello(sfWebRequest $request)
  {
    $this->name = NameTable::getInstance()->find($request->getParameter('id'));
  }
  
  public function executeList(sfWebRequest $request)
  {
    $this->names = NameTable::getInstance()->findAll();
  }
}
