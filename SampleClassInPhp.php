<?php

        /*
         * member variables
         */
         $first = "Hello,world";
        $second = "Bye World";
        
        
        /*
         * constructor
         */
         function __construct(){
            echo 'constructor';    
         }
         
         
         /*
          * functions
          */

          function check1(){
              echo 'check1';
              return "check1";
          }         
          
          
          /*
           * destructor
           */
           function __destruct(){
              unset($first);
              unset($second);
           }
?>