<?php

class tracking{
    /* ---------------------------------------- */
    /* The Tracking tag for GA and TM           */

    public static function tags($location='top'){

        $the_google_id = esc_html(substr(get_option( 'bcSOFF_offline_analytics' ), 0,16));
        $the_google_tag = esc_html(substr(get_option( 'bcSOFF_offline_analytics' ), 0,2));


        if($location=='top' AND $the_google_tag=='UA'){
            ?>
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $the_google_id; ?>"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());

              gtag('config', '<?php echo $the_google_id; ?>');
            </script>
            <?php
        }elseif($location=='top' AND $the_google_tag=='GT'){
            ?>
            <!-- Google Tag Manager -->
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','<?php echo $the_google_id; ?>');</script>
            <!-- End Google Tag Manager -->

            <?php
        }elseif($location=='body' AND $the_google_tag=='GT'){
            ?>
            <!-- Google Tag Manager (noscript) -->
            <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $the_google_id; ?>"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->
            <?php
        }
    }
}