var Druk = Class.create({
  initialize: function(data){
    this.data = data;
    this.htmlDiv = mBrowser.itemDiv.down('.druk_html');
    
    mBrowser.item_standard_title.update(this.data.numer);
    $S('druki/druk_parser_html', mBrowser.mid, this.onHtmlLoad.bind(this));
  },
  onHtmlLoad: function(html){
    var table = new Element('div').update(html).down('table', 1);
    for( var i=0; i<2; i++ ) table.select('tr').first().remove();
    this.htmlDiv.update(table);
    this.htmlDiv.innerHTML = this.htmlDiv.innerHTML.gsub('src="', 'src="http://orka.sejm.gov.pl');
  }
});

var MBrowser = Class.create(MBrowser, {

  getListItemInnerHTML: function(data){
    return data['numer'];
  },
  
  
});
var druk;
var mBrowser;