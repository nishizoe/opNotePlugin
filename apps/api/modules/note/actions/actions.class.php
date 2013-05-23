<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

/**
 * note actions.
 *
 * @package    OpenPNE
 * @subpackage opNotePlugin
 * @author     kaoru nishizoe <nishizoe@tejimaya.com>
 */
class noteActions extends opJsonApiActions
{

  /**
   * preExecute
   */
  public function preExecute()
  {
    $this->memberId = $this->getUser()->getMemberId();
  }

  /**
   * get note
   *
   * @param sfWebRequest $request
   * @return sfView|string
   */
  public function executeGetNote(sfWebRequest $request)
  {
    $note = Doctrine::getTable('Note')->getLatestNote($this->memberId, 20);
    $data = array();
    foreach ($note as $one)
    {
      $tmp = array();
      $tmp['id'] = $one['id'];
      $tmp['member_id'] = $one['member_id'];
      $tmp['note_type_id'] = $one['note_type_id'];
      $tmp['title'] = $one['title'];
      $tmp['is_public'] = $one['is_public'];
      $tmp['tag'] = $one['tag'];
      $tmp['description'] = $one['description'];

      $data[] = $tmp;
    }

    return $this->renderText(json_encode(array('status' => 'success', 'data' => $data)));
  }

  public function executeEmptyNote(sfWebRequest $request)
  {
    $this->form = new NoteForm();
    return $this->renderPartial('note/formDetail', array('note' => $this->form));
  }

  public function executeAddNote(sfWebRequest $request)
  {
    $note = $request->getParameter('note');
    $this->form = new NoteForm();
    $note['member_id'] = $this->memberId;
    $token = $this->form->getCSRFToken();
    $note[$this->form->getCSRFFieldName()] = $token;
    $this->form->bind($note);

    if ($this->form->isValid())
    {
      $this->form->save();
    }

    return $this->executeGetNote($request);
  }

  public function executeGetOne(sfWebRequest $request)
  {
    $noteId = $request->getParameter('id');
    $this->forward404Unless($noteId);
    $note = Doctrine::getTable('Note')->findOneByIdAndMemberId(array($noteId, $this->memberId));
    $data = array();
    $data['note_type_id'] = $note->getNoteTypeId();
    $data['title'] = $note->getTitle();
    $data['is_public'] = $note->getIsPublic();
    $data['tag'] = $note->getTag();
    $data['description'] = $note->getDescription();

    $this->form = new NoteForm();
    $token = $this->form->getCSRFToken();
    $data[$this->form->getCSRFFieldName()] = $token;
    $this->form->bind($data);

    return $this->renderPartial('note/formDetail', array('note' => $this->form));
  }

  public function executeUpdateNote(sfWebRequest $request)
  {
    $note = $request->getParameter('note');
    $record = Doctrine::getTable('Note')->findOneBy('id', $note['id']);
    if (!$record){
      $this->forward400If('' === $note['id'], 'id parameter not specified.');
    }
    $this->form = new NoteForm($record);

    $note['member_id'] = $this->memberId;
    $token = $this->form->getCSRFToken();
    $note[$this->form->getCSRFFieldName()] = $token;
    $this->form->bind($note);
    if ($this->form->isValid()) {
      $this->form->save();
      return $this->executeGetNote($request);
    }

    return $this->renderText(json_encode(array('status' => 'error', 'message' => 'update error')));
  }

  public function executeDeleteNote(sfWebRequest $request)
  {
    $noteId = $request->getParameter('id');
    $record = Doctrine::getTable('Note')->findOneBy('id', $noteId);
    if (!$record){
      $this->forward400If('' === $note['id'], 'id parameter not specified.');
    }
    $record->delete();

    return $this->executeGetNote($request);
  }
}
