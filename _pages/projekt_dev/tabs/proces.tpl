<div class="proces">
{section name="proces" loop=$proces}{assign var="etap" value=$proces[proces]}

  {if $etap.typ_id eq 'text'}
   
    <div class="e">{$etap.text}</div>
  
  {else}

	  <div class="e {$etap.typ}{if $etap.nowa_data} nowa_data{/if}">
	    {if $etap.nowa_data}{$etap.data|kalendarzyk}{/if}
	    <img src="/g/p.gif" class="ikona_legislacyjna {$etap.typ}" />
	    <div class="c">{include file="etapy/"|cat:$etap.typ|cat:".tpl" etap=$etap}</div>
	  </div>
  
  {/if}
  
{/section}
</div>