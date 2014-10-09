<?php
class Elgentos_Codebase_Model_Projects
{

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        $projects = Mage::helper('codebase/api')->projects();
        if(isset($projects['project-id'])) {
            $temp[] = $projects;
            $projects = $temp;
        }
        $return = array(''=>'');
        foreach($projects as $project) {
            $return[] = array('value'=>$project['permalink'],'label'=>$project['name']);
        }
        return $return;
    }

}