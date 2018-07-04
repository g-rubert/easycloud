<?php

//FUNÇÃODA TAG INICIAL DO ARQUIVO XML
 function FuncInicial($parser, $elemento) {
  if($elemento == "ACESSOS") {
 echo"<center>";	  
   echo "<table cellpading=0 cellspacing=0
border=0 width=50%>";
   echo "<tr><td bgcolor=0099CC
align=center>";
   echo "<font face=Arial size=2
color=FFFFFF><b>Relatório de acessos";
}

 elseif($elemento == "CLIENTE")
  echo "<tr><td height=20>";

 elseif($elemento == "NOME") {
  echo "<tr><td bgcolor=#C1F0FF>";
  echo "<font face=Arial size=2><b>";
 }

 elseif($elemento =="QUANTIDADE") {
  echo "<tr><td bgcolor=#DDF7FF>";
  echo "<font face=Arial size=2>";
 }

 elseif($elemento == "SITE") {
  echo "<tr><td bgcolor=#DDF7FF>";
  echo "<font face=Arial size=2>";
 }
}//FECHA FUNCTION FUNCINICIAL

//FUNÇÃO PARAXIBIR OS DADOS DO DOCUMENTO XML
function FuncDados($parser, $dados) {
 echo $dados;
}//FECHA FUNCTION FUNCINICIAL

//FUNÇÃO DA TAG INICIAL DO DOCUEMENTO XML
function FuncFinal($parser, $elemento) {
 if($elemento == "acessos")
  echo "</b></font></td</tr></table>";
 elseif($elemento == "cliente")
  echo "</td></tr>";
 elseif($elemento == "NOME")
  echo "</b></font></td></tr>";
 elseif($elemento == "QUANTIDADE")
  echo "</font></td></tr>";
 elseif($elemento == "Site")
  echo "</font></td></tr>";
}//FECHA FUNCTION FUNCFINAL

//CRIA O PARSER XML
$parser = xml_parser_create();

//DEFINE AS FUNÇÕES
xml_set_element_handler($parser, "FuncInicial",
"FuncFinal");
xml_set_character_data_handler($parser, "FuncDados");

//ABRE O ARQUIVO XML PARALEITURA
$ponteiro = fopen("agenda.xml", "r");

//INICIA A ANÁLISEDO DOCUMENTO XML
while($dados = fread($ponteiro, 4096)) {
 //INICIA A ANÁLISEDO DOCUMENTO XML 
 xml_parse($parser, $dados);
}//FECHA WHILE
//LIBERA A MEMÓRIAUSADA PELO PARSER
xml_parser_free($parser);
?>