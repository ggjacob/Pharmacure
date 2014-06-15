/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function open_infos(){
    window.open('pageb.html','nom_de_ma_popup','menubar=no, scrollbars=no, top=100, left=100, width=300, height=200');
    }

//Remplace l'action par defaut du clique sur un lien sur les elements du tableau
$( "tr.odd > a" ).click(function( event ) {
  event.preventDefault();
  open_infos();
});

$( "tr.even > a" ).click(function( event ) {
  event.preventDefault();
  open_infos();
});