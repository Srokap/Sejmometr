<div id="debaty">
  {section name="debaty" loop=$debaty}{assign var="d" value=$debaty[debaty]}
    
    <div class="d">
      <a href="/posiedzenia/{$d.posiedzenie_id}">{$d.data|kalendarzyk}</a>
      <div class="c">
	      <p class="tytul"><a href="debata/{$d.id}">{$d.tytul}</a></p>
	      <a href="debata/{$d.id}"><img class="baner" src="/resources/debaty/banery/{$d.id}.jpg" /></a>
	      <p class="info">{$d.opis}</p>
      </div>
    </div>
  
  {/section}
</div>