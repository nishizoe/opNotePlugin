<?php

/**
 * PluginNoteTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class PluginNoteTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return object PluginNoteTable
   */
  public static function getInstance()
  {
      return Doctrine_Core::getTable('PluginNote');
  }

  public function getLatestNote($member_id, $limit = 20)
  {
    return $this->createQuery()
      ->addWhere('member_id = ?', array($member_id))
      ->orderBy('created_at desc')
      ->limit($limit)
      ->execute();
  }
}