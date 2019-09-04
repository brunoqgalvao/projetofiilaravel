  <!-- TradingView Widget BEGIN -->
  <script type="text/javascript" src="https://s3.amazonaws.com/tradingview/tv.js"></script>
  <script type="text/javascript">
    new TradingView.widget({
    "container_id": "tv-adv-widget-home",
    "width": "100%",
    "height": "450px",
    "symbol": get_param("symbol", get_param("tvwidgetsymbol", "IBOV")),
    "interval": "1",
    "timezone": "exchange",
    "theme": "White",
    "style": "3",
    "toolbar_bg": "#f1f3f6",
    "withdateranges": true,
    "hide_side_toolbar": false,
    "details": true,
    "allow_symbol_change": true,
    "hideideas": true,
    "widgetbar_width": 300,
    "show_popup_button": false,
    "popup_width": "100%",
    "popup_height": "450px",
    "editablewatchlist": true,
    "customer": "bovespa",
    "locale": get_lang() == 'pt' ? 'br' : get_lang()
    });
  </script>
  <div id="tradingview_d88c0-wrapper" style="position: relative;box-sizing: content-box;width: 100%;height: 300px;margin: 0 auto !important;padding: 0 !important;font-family:Arial,sans-serif;overflow: hidden;border-radius: 3px;"><div style="width: 100%;height: 450px;background: transparent;padding: 0 !important;"><iframe id="tradingview_d88c0" src="https://s.tradingview.com/bovespa/widgetembed/?frameElementId=tradingview_d88c0&amp;symbol=%20ALZR11&amp;interval=1&amp;hidesidetoolbar=0&amp;symboledit=1&amp;saveimage=1&amp;toolbarbg=f1f3f6&amp;editablewatchlist=1&amp;details=1&amp;studies=%5B%5D&amp;widgetbarwidth=300&amp;hideideas=1&amp;theme=White&amp;style=3&amp;timezone=exchange&amp;withdateranges=1&amp;studies_overrides=%7B%7D&amp;overrides=%7B%7D&amp;enabled_features=%5B%5D&amp;disabled_features=%5B%5D&amp;locale=br&amp;utm_source=www.b3.com.br&amp;utm_medium=widget&amp;utm_campaign=chart&amp;utm_term=%20ALZR11" style="width: 100%; height: 100%; margin: 0 !important; padding: 0 !important;" frameborder="0" allowtransparency="true" scrolling="no" allowfullscreen=""></iframe></div></div>
  <!-- TradingView Widget END -->
{{--   
  <div class="large-12 columns show-for-small-only">
      <!-- TradingView Widget BEGIN -->
      <div id="tv-medium-widget-263c2"></div>
      <script type="text/javascript" src="https://d33t3vvu2t2yu5.cloudfront.net/tv.js"></script>
      <script type="text/javascript">
  
    var small_tab_name = "Cotações";
    var small_tabs_dict = new Array();
    small_tabs_dict[0] = small_tab_name;
    var small_symbols_dict = new Array();
    small_symbols_dict[small_tab_name] = new Array();
    small_symbols_dict[small_tab_name].push([get_param("symbol", "IBOV"), get_param("symbol", "IBOV")+"|1d"]);
    
      new TradingView.MiniWidget({
        "container_id": "tv-mini-widget-home",
        "tabs": small_tabs_dict,
        "symbols": small_symbols_dict,
        "gridLineColor": "#E9E9EA",
        "fontColor": "#83888D",
        "underLineColor": "#dbeffb",
        "trendLineColor": "#4bafe9",
        "activeTickerBackgroundColor": "#EDF0F3",
        "noGraph": false,
        "width": "100%",
        "height": "253px",
        "customer": "bovespa",
        "locale": get_lang() == 'pt' ? 'br' : get_lang()
      });
      </script><div id="tradingview_c4e3f-wrapper" style="position: relative;box-sizing: content-box;width: 100%;height: 253px;margin: 0 auto !important;padding: 0 !important;font-family:Arial,sans-serif;overflow: hidden;border-radius: 3px;"><div style="width: 100%;height: 253px;background: #fff;padding: 0 !important;"><iframe id="tradingview_c4e3f" src="https://s.tradingview.com/bovespa/miniwidgetembed/?Cota%C3%A7%C3%B5es=IBOV&amp;tabs=Cota%C3%A7%C3%B5es&amp;IBOV=IBOV%7C1d&amp;locale=br&amp;activeTickerBackgroundColor=%23EDF0F3&amp;trendLineColor=%234bafe9&amp;underLineColor=%23dbeffb&amp;fontColor=%2383888D&amp;gridLineColor=%23E9E9EA&amp;width=100%25&amp;height=253px&amp;locale=br&amp;utm_source=www.b3.com.br&amp;utm_medium=widget&amp;utm_campaign=market-overview" width="100%" height="253px" frameborder="0" allowtransparency="true" scrolling="no" style="margin: 0 !important; padding: 0 !important;"></iframe></div><div style="position:absolute;display: block;box-sizing: content-box;height: 24px;width: 100%;bottom: 0;left: 0;margin: 0;padding: 0;font-family: Arial,sans-serif;"><div style="display: block;margin: 0 1px 1px 1px;line-height: 7px;box-sizing: content-box;height: 11px;padding: 6px 10px;text-align: right;background: #fff;"><a href="https://www.tradingview.com/?utm_source=www.b3.com.br&amp;utm_medium=widget&amp;utm_campaign=market-overview" target="_blank" style="color: #0099d4;text-decoration: none;font-size: 11px;"><span style="color: #b4b4b4;font-size: 11px;">Quotes by</span> TradingView</a></div></div></div>
      <!-- TradingView Widget END -->
  </div>
  <div class="large-12 columns show-for-medium-up">
  <p class="small" style="padding-top:10px"><a target="_blank" href="https://br.tradingview.com/symbols/BMFBOVESPA-IBOV/">IBOV</a> chart by TradingView </p>
  </div> --}}
</div>