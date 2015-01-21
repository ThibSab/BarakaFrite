<?php

namespace Commande\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Commande\Model\Commande;          
use Commande\Form\CommandeForm;
use Zend\Json\Json as Json;

class CommandeController extends AbstractActionController
{
    protected $commandeTable;

    public function indexAction()
    {

    }
    
    public function addAction()
    {
        $form = new CommandeForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $commande = new Commande();
            $form->setInputFilter($commande->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $commande->exchangeArray($form->getData());
                $this->getCommandeTable()->saveCommande($commande);

                // Redirect to list of albums
                return $this->redirect()->toRoute('commande');
            }
        }
        return array('form' => $form);
    }
    
    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('commande', array(
                'action' => 'add'
            ));
        }
        $commande = $this->getCommandeTable()->getCommande($id);

        $form  = new CommandeForm();
        $form->bind($commande);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            //$form->setInputFilter($album->getInputFilter());
            $form->setData($request->getPost());

            
            
            if ($form->isValid()) {
                $this->getCommandeTable()->saveCommande($form->getData());

                return $this->redirect()->toRoute('commande');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
 
    }
    
    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('commande');
        }
        $this->getCommandeTable()->deleteCommande($id);
        return $this->redirect()->toRoute('commande');
        
    }
    
    public function exportAction()
    {
        $commande = $this->getCommandeTable()->fetchAll();
        $json = Json::encode($commande);
       
        echo Json::prettyPrint($json, array("indent" => " "));
        
    }
    
    
    public function getCommandeTable()
    {
         //if (!$this->commandeTable) {
             $sm = $this->getServiceLocator();
             $this->commandeTable = $sm->get('Commande\Model\CommandeTable');
         //}
        return $this->commandeTable;
    }
    
}