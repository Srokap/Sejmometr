<div id="punkt" class="_height_controll">
  <div class="inner_title_bar">
    <p class="data">posiedzenie <b>{$DATA.punkt.posiedznie_numer}</b>, {$DATA.punkt.data}</p>
    <p>{$DATA.punkt.sejm_id}</p>
  </div>
  
  <div id="punkt_form"></div>
  <p id="punkt_buttons">
    <a href="#" onclick="return false;" class="szukaj_nazwa">Szukaj druku po tytule</a>
  </p>
</div>
<script>
  _druki_data = {$DATA.druki_data|@json_encode};
  _wypowiedzi = {$DATA.wypowiedzi|@json_encode};

  punkt = new Punkt({$DATA.punkt|@json_encode});
</script>