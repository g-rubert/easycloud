
<?php
$meus_links = array();
 
$meus_links[0]['url'] = '30000 acessos';
//$meus_links[0]['title'] = 'Teste 1';
//$meus_links[0]['description'] = 'Desc 1';
//$meus_links[0]['image'] = 'Image 1';


/* 
$meus_links[1]['id'] = '2';
$meus_links[1]['title'] = 'Teste 2';
$meus_links[1]['description'] = 'Desc 2';
$meus_links[1]['image'] = 'Image 2';
 
$meus_links[2]['id'] = '3';
$meus_links[2]['title'] = 'Teste 3';
$meus_links[2]['description'] = 'Desc 3';
$meus_links[2]['image'] = 'Image 3';*/
 
// Receberá todos os dados do XML
$xml = '<?xml version="1.0" encoding="ISO-8859-1"?>';
 
// A raiz do meu documento XML
$xml .= '<AnaliseDeURL>';
 
for ( $i = 0; $i < count( $meus_links ); $i++ ) {
 $xml .= '<acessos>';
 $xml .=  '<url>' . $meus_links[$i]['access'] .'</url>' ;
/* $xml .= '<title>' . $meus_links[$i]['title'] . '</title>';
 $xml .= '<description>' . $meus_links[$i]['description'] . '</description>';
 $xml .= '<image>' . $meus_links[$i]['image'] . '</image>';*/
 $xml .= '</acessos>';
}
 
$xml .= '</acessos>';

 
 
// Escreve o arquivo
$fp = fopen('meus_links.xml', 'w+');
fwrite($fp, $xml);
fclose($fp);
?>