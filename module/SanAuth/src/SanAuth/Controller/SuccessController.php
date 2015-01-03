<?php

namespace SanAuth\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class SuccessController extends AbstractActionController {

    public function indexAction() {
        /*
//        if (!$this->getServiceLocator()
//                        ->get('AuthService')->hasIdentity()) {
//            return $this->redirect()->toRoute('login');
//        }
        */
        return new ViewModel(array(
             'commandes' => \Commande\Controller\CommandeController::getCommandeTable()->fetchAll(),
         ));
        
        
        /*
        $log = $this->getServiceLocator()->get('Zend\Log\Logger');
        $log->log(1,"ALERT");
        $log->log(6,"INFO");
        return new ViewModel();*/
    }

}
