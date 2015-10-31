<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class vente_model extends CI_Model {
    public function __construct(){
        parent::__construct();

    }
    function get_all(){ //renvoie toutes les pizzas dans un array
        
        $results = $this->db->get('pizza')
                    ->result();
        
        return $results;
        
    }
    function get($id) { //recupère un element dans la db
            
            $results = $this->db->get_where('pizza', array('PK_pizza' => $id))
                ->result();
//            recupère premier resultat
            $result = $results[0];
            

            return $result;
        }
    
    function new_cmd($cmd){
        
        $user = $this->db->get_where('mangeur', array('pseudo_mangeur' => $cmd['user']))
                        ->row();
        
        $commande = $cmd['commande'];
        
//        a faire: boucle parcourant le tableau $commande et qui insère la commande et le détail dans la db
        
        // insère la commande et recupère PK_commande
        
        $this->db->insert('commande', array('FK_mangeur' => $user->PK_mangeur));
        $numcmd = $this->db->insert_id();
        
//        insère les données dans le détail de la commande
        
        foreach($commande as $article){
            
            $pizza = $this->db->select('PK_pizza')->get_where('pizza', array('nom_pizza' => $article['name']))
                    ->row();
            
            $row = array('FK_cmd' => $numcmd,
                         'FK_pizza' => $pizza->PK_pizza,
                         'quantite' => $article['qty']
                        );
            
            $this->db->insert('details_cmd', $row);
        }
    return TRUE;    
    }
}
?>