<?php
namespace Commande\Model;

 use Zend\Db\TableGateway\TableGateway;

 class CommandeTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getCommande($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveCommande(Commande $commande)
     {
         $data = array(
             'nom' => $commande->nom,
             'prix'  => $commande->prix,
             'etat' =>$commande->etat,
         );

         $id = (int) $commande->id;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getCommande($id)) {
                 $this->tableGateway->update($data, array('id' => $id));
             } else {
                 throw new \Exception('Commande id does not exist');
             }
         }
     }

     public function deleteCommande($id)
     {
         $this->tableGateway->delete(array('id' => (int) $id));
     }
 }

