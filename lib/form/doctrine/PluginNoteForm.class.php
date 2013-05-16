<?php

/**
 * PluginNote form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginNoteForm extends BaseNoteForm
{
  public function setup()
  {
    parent::setup();

    $this->setWidget('member_id', new sfWidgetFormInputHidden());

//    unset($this['id']);
//    unset($this['member_id']);
    unset($this['created_at']);
    unset($this['updated_at']);

    $this->useFields(array('note_type_id', 'title', 'is_public', 'tag', 'description'));
  }
}
