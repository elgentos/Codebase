<?php

class Elgentos_Codebase_Adminhtml_CodebaseController extends Mage_Adminhtml_Controller_action
{

    protected function _initAction($title=null) {
        $this->loadLayout();
        if($title!=null) {
            $this->getLayout()->getBlock('head')->setTitle($title.' / Magento Admin');
        }
        $this->_setActiveMenu('codebase/codebase');
        return $this;
    }

    public function indexAction() {
        $project = Mage::getStoreConfig('codebase/general/project');
        Mage::register('codebase_project', $project);
        $accountdomain = Mage::getStoreConfig('codebase/general/accountdomain');
        Mage::register('codebase_accountdomain', $accountdomain);
        $this->_initAction('Elgentos Tickets' . ' ' . $this->__('for') . ' ' . ucwords($project))->renderLayout();
    }

    public function viewAction() {
        $project = $this->getRequest()->getParam('project');
        $ticket = (int)$this->getRequest()->getParam('ticket');
        $accountdomain = Mage::getStoreConfig('codebase/general/accountdomain');
        Mage::register('codebase_project', $project);
        Mage::register('codebase_ticket', $ticket);
        Mage::register('codebase_accountdomain', $accountdomain);
        $this->_initAction('Ticket #'.$ticket . ' / ' . ucwords($project))->renderLayout();
    }

    public function addAction() {
        $this->_initAction($this->__('Add ticket'))->renderLayout();
    }

    public function addpostAction() {
        $whitelisted = array('summary','type','additional','priority-id','status-id','category-id','browser');
        $tParams = $this->getRequest()->getParams();
        foreach($tParams['ticket'] as $key=>$value) {
            if(in_array($key,$whitelisted)) {
                if($key=='type') $key = 'ticket-type';
                $params[$key] = $value;
            }
        }
        foreach($_FILES['ticket']['name']['files'] as $key=>$value) {
            if(empty($value)) {
                unset($_FILES['ticket']['name']['files'][$key]);
                unset($_FILES['ticket']['type']['files'][$key]);
                unset($_FILES['ticket']['tmp_name']['files'][$key]);
                unset($_FILES['ticket']['error']['files'][$key]);
                unset($_FILES['ticket']['size']['files'][$key]);
            } else {
                $files[] = array('tmp_name'=>$_FILES['ticket']['tmp_name']['files'][$key],'name'=>$_FILES['ticket']['name']['files'][$key],'type'=>$_FILES['ticket']['type']['files'][$key]);
            }
        }
        $ticket = Mage::helper('codebase/api')->addTicket($params,$_FILES);
        if(!empty($params['additional'])) {
            if($params['browser']!='unknown') {
                Mage::helper('codebase/api')->note($params['additional']."\nBrowser: ".$params['browser'],$ticket['ticket-id']);
            } else {
                Mage::helper('codebase/api')->note($params['additional'],$ticket['ticket-id']);
            }
        } else {
            if($params['browser']!='unknown') {
                Mage::helper('codebase/api')->note("Browser: ".$params['browser'],$ticket['ticket-id']);
            }
        }
        if(!empty($files)) {
            Mage::helper('codebase/api')->addAttachments($files,$ticket['ticket-id']);
        }

        Mage::getSingleton('core/session')->addSuccess('Ticket #'.$ticket['ticket-id'].' '.$this->__('has been successfully added.'));
        $this->_redirect("codebase/adminhtml_codebase");
    }

}
