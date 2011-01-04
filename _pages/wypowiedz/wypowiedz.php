<?
  $id = $_GET['_ID'];
  
  $wypowiedz = $this->DB->selectAssoc("SELECT wypowiedzi.id, wypowiedzi.funkcja_id, wypowiedzi.autor_id, wypowiedzi.text, ludzie.nazwa as 'autor', wypowiedzi_funkcje.nazwa as 'funkcja', wypowiedzi_funkcje.klub as 'k', poslowie.klub, wypowiedzi.punkt_id, ludzie.avatar FROM wypowiedzi LEFT JOIN ludzie ON wypowiedzi.autor_id=ludzie.id LEFT JOIN wypowiedzi_funkcje ON wypowiedzi.funkcja_id=wypowiedzi_funkcje.id LEFT JOIN poslowie ON ludzie.id=poslowie.id WHERE wypowiedzi.id='$id'");
  $this->DB->q("UPDATE wypowiedzi SET ilosc_odwiedzin=ilosc_odwiedzin+1 WHERE id='$id'");




  $_typy_tytuly = array(
    '1' => 'Debata',
    '2' => 'Pytania w sprawach bieżących',
    '3' => 'Informacja w sprawach bieżących',
    '4' => 'Debata specjalna',
    '5' => 'Ślubowanie',
    '6' => 'Oświadczenia',
  );

  $id = $_GET['_ID'];
  
  
  $debata = $this->DB->selectAssoc("SELECT punkty_wypowiedzi.id, punkty_wypowiedzi.dzien_id, punkty_wypowiedzi.opis, punkty_wypowiedzi.typ_id, posiedzenia_dni.data, projekty.tytul, posiedzenia_dni.posiedzenie_id, multidebaty.id as 'multi', multidebaty.tytul as 'multi_tytul', debaty_specjalne.id as 'specjalna', debaty_specjalne.tytul as 'specjalna_tytul', informacje_biezace.id as 'ib', informacje_biezace.tytul as 'ib_tytul', informacje_biezace.klub_id, druki_autorzy.autor FROM punkty_wypowiedzi JOIN posiedzenia_dni ON punkty_wypowiedzi.dzien_id=posiedzenia_dni.id LEFT JOIN projekty_etapy ON punkty_wypowiedzi.id=projekty_etapy.etap_id LEFT JOIN projekty ON projekty_etapy.projekt_id=projekty.id LEFT JOIN multidebaty ON punkty_wypowiedzi.id=multidebaty.id LEFT JOIN debaty_specjalne ON punkty_wypowiedzi.id=debaty_specjalne.id LEFT JOIN informacje_biezace ON punkty_wypowiedzi.id=informacje_biezace.id LEFT JOIN druki_autorzy ON druki_autorzy.id=informacje_biezace.klub_id WHERE punkty_wypowiedzi.id='".$wypowiedz['punkt_id']."'");
  
  
  if( $debata['multi'] ) {
    $debata['tytul'] = $debata['multi_tytul'];
  }
  
  if( $debata['specjalna'] ) {
    $debata['tytul'] = $debata['specjalna_tytul'];
  }
  
  if( $debata['ib'] ) {
    $debata['tytul'] = $debata['ib_tytul'];
  }
  
  $debata['typ_tytul'] = $_typy_tytuly[ $debata['typ_id'] ];
  
  
  if( $debata['typ_id']=='3' ) {
    $this->TITLE = $debata['tytul'];
    $_GET['_SUB_MENU_SELECTED'] = 'informacje_biezace';
  } else if( $debata['typ_id']=='4' ) {
    $this->TITLE = $debata['tytul'];
    $_GET['_SUB_MENU_SELECTED'] = 'debaty_specjalne';
  } else {
    $this->TITLE = $debata['typ_tytul'];
    if($debata['tytul']) $this->TITLE .= ', '.$debata['tytul'];
  }  
  
  
  $this->SMARTY->assign('wyp', $wypowiedz );
  $this->SMARTY->assign('debata', $debata );
?>