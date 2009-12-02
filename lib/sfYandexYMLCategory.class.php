<?php

class sfYandexYMLCategory
{
  private $__id = null;
  private $__name = null;
  private $__parent_id = null;
  private $__tid = null;
  private $__yid  = null;
  private $__xml = null;

  /**
   *
   * @param int $id
   * @param string $name
   * @param int|sfYandexYMLCategory $parent_id
   * @param array $options
   */
  public function __construct($id, $name, $parent_id=null, array $options = array())
  {
    $this->__id=$id;
    $this->__name = htmlspecialchars($name);

    if ($parent_id instanceof sfYandexYMLCategory)
    {
      $this->__parent_id = $parent_id->getId();
    }
    else
    {
      $this->__parent_id = $parent_id;
    }
  }


  public function getId()
  {
    return $this->__id;
  }

  public function getName()
  {
    return $this->__name;
  }

  public function getParentId()
  {
    return $this->__parent_id;
  }


  /**
   * @return DOMDocument
   */
  function toXML()
  {
    $xml = new DOMDocument();
    $xcat= $xml->appendChild(new DOMElement('category', $this->__name));
    $xcat->appendChild(new DOMAttr('id', $this->__id));
    if ($this->__parent_id)
    {
      $xcat->appendChild(new DOMAttr('parentId',$this->__parent_id));
    }

    return $xml;
  }

}
