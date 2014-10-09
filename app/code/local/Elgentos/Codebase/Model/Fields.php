<?php
class Elgentos_Codebase_Model_Fields
{

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        $return = array();
        $return[] = array('value'=>'id','label'=>Mage::helper('codebase/api')->__('ID'));
        $return[] = array('value'=>'type','label'=>Mage::helper('codebase/api')->__('Type'));
        $return[] = array('value'=>'summary','label'=>Mage::helper('codebase/api')->__('Summary'));
        $return[] = array('value'=>'browser','label'=>Mage::helper('codebase/api')->__('Browser'));
        $return[] = array('value'=>'reporter','label'=>Mage::helper('codebase/api')->__('Reporter'));
        $return[] = array('value'=>'assignee','label'=>Mage::helper('codebase/api')->__('Assignee'));
        $return[] = array('value'=>'created-at','label'=>Mage::helper('codebase/api')->__('Created at'));
        $return[] = array('value'=>'updated-at','label'=>Mage::helper('codebase/api')->__('Updated at'));
        $return[] = array('value'=>'status','label'=>Mage::helper('codebase/api')->__('Status'));
        $return[] = array('value'=>'priority','label'=>Mage::helper('codebase/api')->__('Priority'));
        $return[] = array('value'=>'category','label'=>Mage::helper('codebase/api')->__('Category'));
        $return[] = array('value'=>'codebase','label'=>Mage::helper('codebase/api')->__('Link to Codebase'));
        return $return;
    }

}