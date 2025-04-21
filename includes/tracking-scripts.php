<?php
function tracking_codes_insert_scripts() {
    $options = get_option('tracking_codes_settings');

    if (!empty($options['ga4']) && !empty($options['ga4_enabled']) && $options['ga4_enabled'] === 'on') {
        echo "<script async src='https://www.googletagmanager.com/gtag/js?id={$options['ga4']}'></script>";
        echo "<script>
                window.dataLayer = window.dataLayer || [];
                function gtag() { dataLayer.push(arguments); }
                gtag('js', new Date());
                gtag('config', '{$options['ga4']}');
              </script>";
    }

    if (!empty($options['gtm']) && !empty($options['gtm_enabled']) && $options['gtm_enabled'] === 'on') {
        echo "<script>
                (function(w, d, s, l, i) {
                    w[l] = w[l] || [];
                    w[l].push({ 'gtm.start': new Date().getTime(), event: 'gtm.js' });
                    var f = d.getElementsByTagName(s)[0],
                        j = d.createElement(s),
                        dl = l != 'dataLayer' ? '&l=' + l : '';
                    j.async = true;
                    j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                    f.parentNode.insertBefore(j, f);
                })(window, document, 'script', 'dataLayer', '{$options['gtm']}');
              </script>";
    }

    if (!empty($options['facebook_ads']) && !empty($options['facebook_ads_enabled']) && $options['facebook_ads_enabled'] === 'on') {
        echo "<script>
                !function(f,b,e,v,n,t,s) {
                    if(f.fbq) return; n = f.fbq = function() {
                        n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments);
                    };
                    if (!f._fbq) f._fbq = n;
                    n.push = n; n.loaded = true; n.version = '2.0'; 
                    n.queue = []; t = b.createElement(e); t.async = true; 
                    t.src = v; s = b.getElementsByTagName(e)[0]; 
                    s.parentNode.insertBefore(t, s);
                }(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
                fbq('init', '{$options['facebook_ads']}');
                fbq('track', 'PageView');
              </script>";
    }

    if (!empty($options['google_ads']) && !empty($options['google_ads_enabled']) && $options['google_ads_enabled'] === 'on') {
        echo "<script>
                gtag('config', '{$options['google_ads']}');
              </script>";
    }

    if (!empty($options['microsoft_ads']) && !empty($options['microsoft_ads_enabled']) && $options['microsoft_ads_enabled'] === 'on') {
        echo "<script>
                (function(w,d,t,r,u) {
                    var f,n,i; w[u] = w[u] || [], f = function() {
                        var o = { ti: '{$options['microsoft_ads']}' };
                        o.q = w[u], w[u] = new UET(o), w[u].push('pageLoad');
                    };
                    n = d.createElement(t), n.src = r, n.async = 1;
                    i = d.getElementsByTagName(t)[0], i.parentNode.insertBefore(n, i);
                })(window, document, 'script', 'https://bat.bing.com/bat.js', 'uetq');
              </script>";
    }

    if (!empty($options['ahrefs_analytics']) && !empty($options['ahrefs_analytics_enabled']) && $options['ahrefs_analytics_enabled'] === 'on') {
        echo "<script src='https://analytics.ahrefs.com/analytics.js' data-key='{$options['ahrefs_analytics']}'> ";
    }
}
