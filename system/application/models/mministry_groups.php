<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mministry_groups
 *
 * @author simon
 */
class mministry_groups extends CI_Model{
    function get_all_ministry_grp(){
      $data = array();
      $Q = $this -> db -> get('ministry_groups');
            if($Q->num_rows()>0){
                
           foreach($Q->result_array() as $row){
               $data[] = $row;
           }
       }
       $Q ->free_result();
       return $data;
   }
   function get_ministry_grp_by_id($id){
        $data = array();
       $this -> db -> where('id',$id);
       $Q = $this -> db -> get('ministry_groups');
       if($Q->num_rows()>0){
           $data = $Q->row_array();
       }
       $Q->free_result();
       return $data;
   }
   function get_ministrygrp_dropdown(){
       $data = array();
       $this -> db -> from('ministry_groups');
       $Q = $this -> db -> get();
       if($Q -> num_rows() > 0){
           $data[0] = "--ministry groups--";
           foreach($Q -> result_array() as $answer){
                $data[$answer['id']] = $answer['ministry'];
           } 
       }
        $Q -> free_result();
        return $data;
   }
}

?>
