
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset='utf-8'>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>E-MOTION : LOGIN </title>
    <meta property="fb:app_id" content="114069411958430">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="E-MOTION">
    <meta property="og:title" content="Location Voiture">
    <meta property="og:description">
    <meta property="og:url">
    <meta property="og:image">
    <meta name="robots" content="index, follow">
    <link as='font' crossorigin='anonymous' rel='preload' type='font/woff'>

    <link href='https://d2y2masl4rtrav.cloudfront.net' rel='dns-prefetch'>
    <link href='https://maps.googleapis.com' rel='dns-prefetch'>
    <link href='https://maps.gstatic.com' rel='dns-prefetch'>
    <link href='https://mts0.googleapis.com' rel='dns-prefetch'>
    <link href='https://mts1.googleapis.com' rel='dns-prefetch'>

    <meta content='Drivy' name='author'>

    <meta content='width=device-width, initial-scale=1.0' name='viewport'>



    <link href='https://blog.drivy.com/feed/' rel='alternate' title='Drivy RSS' type='application/rss+xml'>

    <link rel="stylesheet" media="screen" href="https://d2y2masl4rtrav.cloudfront.net/packs/css/vendor.style-3f06c2d7.chunk.css" />
    <link rel="stylesheet" media="screen" href="https://d2y2masl4rtrav.cloudfront.net/packs/css/application.getaround.style-379c2e6b.chunk.css" />

    <meta name="csrf-param" content="authenticity_token" />
    <meta name="csrf-token" content="Qza1q9rY6HfotsH0tjKiLOSVfFU4fSQsc++hvfmkeomJPNTkh88GfdRK3mYQdpMilhgJEAuYB15FLttiojr0yA==" />



    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- Styles -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script src="https://kit.fontawesome.com/ec73f164d2.js"></script>
    <script>
      $(function() {
        $('input[name="daterange"]').daterangepicker({
          opens: 'left'
        }, function(start, end, label) {
          console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $('#price_start').on('input',function() {
          $('#price_start_value').html($(this).val() + '€');
        });
        $('#price_end').on('input',function() {
          $('#price_end_value').html($(this).val() + '€');
        });
        $('#book').click(function() {
          var result  = '#result-content';
          $.ajax({
            method: 'POST',
            url: '/ajaxCreate',
            data: {
              range       : $('input[name="daterange"]').val(),
              cities      : $('#cities-select option:selected').text(),
              category    : $('#categories-select option:selected').val(),
              minPrice    : $('#price_start').val(),
              maxPrice    : $('#price_end').val()
            },
            dataType: "json"
          })
            .done(function(data) {

              data.vehicle;
              data.days;

            })
            .fail(function(data,status) {
              result.text('no vehicle found');
            });
        });
      });

    </script>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      var gaConfig = {};
      gaConfig['cookieDomain'] = 'fr.getaround.com';

      ga('create', 'UA-15846816-7', gaConfig);
      ga('require', 'displayfeatures');
      ga('set', 'anonymizeIp', true);

      function gaHitTimestamp() {
        var now = new Date();
        var pad = function(num) {
          var norm = Math.abs(Math.floor(num));
          return (norm < 10 ? '0' : '') + norm;
        };

        return now.getUTCFullYear()
          + '-' + pad(now.getUTCMonth()+1)
          + '-' + pad(now.getUTCDate())
          + ' ' + pad(now.getUTCHours())
          + ':' + pad(now.getUTCMinutes())
          + ':' + pad(now.getUTCSeconds())
      }

      // Session
      ga('set', 'dimension9', new Date().getTime() + '.' + Math.random().toString(36).substring(5))
    </script>
    <script>
      ga('set', 'dimension6', '0');
    </script>

    <script>
      ga('send', 'pageview', {
        dimension8: gaHitTimestamp()
      });
    </script>

    <script async src='https://www.googletagmanager.com/gtag/js?id=927657686'></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() { dataLayer.push(arguments); }
      gtag('js', new Date());
      gtag('set', 'linker', { 'domains': ["fr.getaround.com","en.getaround.com","de.getaround.com","es.getaround.com","at.getaround.com","be.getaround.com","fr.be.getaround.com","uk.getaround.com"] })
      gtag('config', "927657686", { conversion_linker: false });
      gtag('config', "1018427586", { conversion_linker: false });
      gtag('config', "AW-971913374", { conversion_linker: false });
    </script>


    <script>
      !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
      n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
      document,'script','https://connect.facebook.net/en_US/fbevents.js');

      fbq('init', "868074043244839");
      fbq('track', "PageView");
    </script>
    <noscript>
      <img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=868074043244839&amp;ev=PageView&amp;noscript=1"
      />
    </noscript>


  </head>
  <body data-action='users-sessions-new' id='users_sessions_new'>
    {{-- var days--}}
    <?php
    $sToday     = Carbon\Carbon::today();
    $sAWeek     = Carbon\Carbon::tomorrow()->addDays(7);
    ?>
    {{-- end var days--}}


    <div class='js_site_content site_content'>



    <div class='authentication_layout'>
    <div class='authentication_layout__section authentication_layout__section--primary'>
    <div class='authentication_layout__logo authentication_layout__logo--rebranded hidden-xs'>
    </div>
    <div class='visible-xs authentication_layout__close'><a class="link_no_style" aria-label="Close" href="/">&#10005;</a></div>
    <div class='authentication_layout__content'>
    <div class='cobalt-TabBar cobalt-mb-loose js_registration_session_tab_bar'>
      <div class='cobalt-TabBar__ScrollControl js_tab_bar_scroll_control' data-direction='left' hidden>
        <button class='cobalt-TabBar__ScrollButton' hidden>
          <div class='cobalt-Icon cobalt-Icon--colorGraphiteLight'><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M14.811 17.343L9.468 12l5.343-5.355L13.166 5l-7 7 7 7z" />
            </svg>
          </div>
        </button>
      </div>
      <div class='cobalt-TabScroller cobalt-TabScroller--underlined js_tab_bar_scroller'>
        <div class='cobalt-TabScroller__ScrollArea js_tab_bar_scroll_area'>
          <a class="cobalt-Tab" aria-selected="true" href="/login"><div class='cobalt-Tab__Content'>
          Se connecter
          </div>
          </a><a class="cobalt-Tab" aria-selected="false" href="/register"><div class='cobalt-Tab__Content'>
          S&#39;inscrire
          </div>
          </a>
        </div>
      </div>
      <div class='cobalt-TabBar__ScrollControl js_tab_bar_scroll_control' data-direction='right' hidden>
        <button class='cobalt-TabBar__ScrollButton' hidden>
          <div class='cobalt-Icon cobalt-Icon--colorGraphiteLight'><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M8.022 17.343L13.365 12 8.022 6.645 9.667 5l7 7-7 7z" />
          </svg>
          </div>
        </button>
      </div>
    </div>

    <div class='authentication_header'>
    <div class='authentication_header__title'>Connectez-vous à votre compte</div>
    </div>
    <a class="cobalt-Button cobalt-Button--large js_continue_with_google cobalt-bottom_margin_tight" href="/users/auth/google"><span class="cobalt-Button__Icon"><span class="cobalt-Icon"><svg width="24" height="24" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg"><svg height='18px' viewbox='0 0 18 18' width='18px' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>
    <g fill='none' fill-rule='evenodd'>
    <path d='M9,3.48 C10.69,3.48 11.83,4.21 12.48,4.82 L15.02,2.34 C13.46,0.89 11.43,0 9,0 C5.48,0 2.44,2.02 0.96,4.96 L3.87,7.22 C4.6,5.05 6.62,3.48 9,3.48 L9,3.48 Z' fill='#EA4335'></path>
    <path d='M17.64,9.2 C17.64,8.46 17.58,7.92 17.45,7.36 L9,7.36 L9,10.7 L13.96,10.7 C13.86,11.53 13.32,12.78 12.12,13.62 L14.96,15.82 C16.66,14.25 17.64,11.94 17.64,9.2 L17.64,9.2 Z' fill='#4285F4'></path>
    <path d='M3.88,10.78 C3.69,10.22 3.58,9.62 3.58,9 C3.58,8.38 3.69,7.78 3.87,7.22 L0.96,4.96 C0.35,6.18 0,7.55 0,9 C0,10.45 0.35,11.82 0.96,13.04 L3.88,10.78 L3.88,10.78 Z' fill='#FBBC05'></path>
    <path d='M9,18 C11.43,18 13.47,17.2 14.96,15.82 L12.12,13.62 C11.36,14.15 10.34,14.52 9,14.52 C6.62,14.52 4.6,12.95 3.88,10.78 L0.97,13.04 C2.45,15.98 5.48,18 9,18 L9,18 Z' fill='#34A853'></path>
    </g>
    </svg>
    </svg></span></span><span>Continuer avec Google</span></a>
    <a class="cobalt-Button cobalt-Button--large cobalt-Button--facebook js_continue_with_facebook cobalt-bottom_margin" href="/users/auth/facebook"><span class="cobalt-Button__Icon"><span class="cobalt-Icon cobalt-Icon--colorWhite"><svg width="29" height="30" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d='M20.5 4.875v13.75c0 .52-.182.964-.547 1.328a1.808 1.808 0 0 1-1.328.547h-3.32v-6.914h2.343L18 10.93h-2.695V9.25c0-.417.078-.73.234-.938.208-.234.56-.351 1.055-.351H18V5.617c-.547-.078-1.224-.117-2.031-.117-1.042 0-1.869.306-2.48.918-.613.612-.919 1.465-.919 2.559v1.953h-2.383v2.656h2.383V20.5H4.875c-.52 0-.964-.182-1.328-.547A1.808 1.808 0 0 1 3 18.625V4.875c0-.52.182-.964.547-1.328A1.808 1.808 0 0 1 4.875 3h13.75c.52 0 .964.182 1.328.547.365.364.547.807.547 1.328z' fill-rule='evenodd'></path>
    </svg></span></span><span>Continuer avec Facebook</span></a>

    <div class='cobalt-text_style_caption text_center cobalt-bottom_margin'>ou</div>
    <form class="new_user" id="new_user" action="/login" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="authenticity_token" value="cK0Q6sHM8I9PHz54Xqlo5H5QAw9D9zlpT2KdqmOZE2y6p3GlnNsehXPjIer47VnqDN12SnASGht5o+d1OAedLQ==" />
    <div class="cobalt-FormField" data-form-field-method="email"><div class="cobalt-TextField cobalt-TextField--withIcon"><input placeholder="Email" class="cobalt-TextField__Input" type="text" name="user[email]" id="user_email" /><span class="cobalt-TextField__Icon"><span class="cobalt-Icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
      <path d="M20,8 L12,13 L4,8 L4,6 L12,11 L20,6 L20,8 Z M20,4 L4,4 C2.89,4 2,4.89 2,6 L2,18 C2,19.1045695 2.8954305,20 4,20 L20,20 C21.1045695,20 22,19.1045695 22,18 L22,6 C22,4.89 21.1,4 20,4 Z"/>
    </svg>
    </span></span></div></div>
    <div class="cobalt-FormField" data-form-field-method="password"><div class="cobalt-TextField cobalt-TextField--withIcon"><input placeholder="Mot de passe" class="cobalt-TextField__Input" type="password" name="user[password]" id="user_password" /><span class="cobalt-TextField__Icon"><span class="cobalt-Icon"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path d="m7 10c-1.106.003-2 .901-2 2.009v6.982c0 1.107.898 2.009 2.006 2.009h9.988c1.109 0 2.006-.9 2.006-2.009v-6.981a2.009 2.009 0 0 0 -2-2.01v-3a5 5 0 0 0 -10 0zm8 0h-6v-3a3 3 0 0 1 6 0z" />
    </svg>
    </span></span></div></div>
    <div class='authentication_password_reset'>
    <div class='cobalt-bottom_margin_tight'><a href="/password/reset">Mot de passe oublié</a></div>
    </div>
    <input value="1" type="hidden" name="user[remember_me]" id="user_remember_me" />
    <input type="submit" name="commit" value="Se connecter" class="cobalt-Button cobalt-Button--primary cobalt-Button--large cobalt-Button--fullWidth cobalt-bottom_margin js_signin_with_email_button" data-disable="true" />
    </form>
    <div class='text_center cobalt-text_style_body'>
    Pas encore de compte E-MOTION ?
    <a href="/register">S&#39;inscrire</a>
    </div>

    </div>
    <div class='authentication_layout__footer'>
    <div class='corporate_footer footer--ultra_light'>
    <div class='corporate_footer__container container'>
    <div class='corporate_footer__copyright_links_container'>
    <div class='corporate_footer__copyright'>© E-MOTION 2019-2020 - Tous droits réservés</div>
    <ul class='corporate_footer__links'>
    </ul>
    </div>
    </div>
    </div>

    </div>
    </div>
    <div class='authentication_layout__section authentication_layout__section--background_1 authentication_layout__section--secondary'></div>
    </div>

    </div>
    <footer class='footers js_footers'>


    </footer>

    <div class='scripts'>

    <script id="js_config" type="application/json">
      {"env":"production","country":"FR","locale":"fr","remoteIP":"80.15.154.187","host":"\"fr.getaround.com\"","userAgent":"\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36\"","action":"users-sessions-new","sentryDsn":"https://af4546ab003a40288665ac7ae5c2d027@sentry.io/167570","release":"7df647d99bd09d3ead677fc9c722ec6ecbeb78ec","jsErrorsWhitelistedUrls":["fr.getaround.com","d2y2masl4rtrav.cloudfront.net"],"googleApiKey":"AIzaSyAsnQSjaFmgUUm5N_hbgMwY86uuVV6u9nk","appPackageName":"com.c4mprod.voiturelib","stripe":{"publishableKey":"pk_live_fv6eZDKN88abFA82sc6xu5Fv","scriptSrc":"https://js.stripe.com/v3/","sca":false},"zendeskScriptSrc":"https://static.zdassets.com/ekr/snippet.js?key=cef1d1b0-1bc7-4e07-acce-dca5444c67f4","currencyFormatting":{"separator":",","delimiter":" ","format":"%n%u"},"i18nKeys":{"javascript":{"date":{"formats":{"default":"DD/MM/YYYY","day_name_short":"ddd D MMM","day_name_long":"dddd D MMM","day_month":"D MMM"}},"validation_errors":{"file_too_big":"Le fichier dépasse la taille maximale autorisée.","file_too_small":"Le fichier est trop petit, veuillez envoyer un plus gros fichier.","wrong_file_type":"Seules les images au format %{accepted_types} sont acceptées."},"restrictions":{"no_limit_delay":"Pas de limites sur le délai de réservation","no_delay_max":"Toutes les dates à venir","delay_max":"Les %{delay_max} prochains jours","delay_max_in_month":{"one":"Le mois prochain","other":"Les %{count} prochains mois"},"delay_middle":"Entre %{delay_min} et %{delay_max} jours à l'avance","delay_exact":"Exactement %{delay} jours à l'avance (déconseillé)","length_between":"Pas de location de %{length_min} ou moins - Maximum %{length_max}","length_between_no_minimum":"Pas de minimum - Maximum %{length_max}","length_in_days":"%{length} jours","length_in_days_singular":"%{length} jour","length_in_hours":"%{length} heures","length_in_hours_singular":"%{length} heure"},"search":{"by_day":"/jour"},"payments":{"payment_date":"Date de paiement","planned":"Prévu","amount":"Montant du paiement","rental_id":"Numéro de location","car":"Voiture","car_plate_number":"Plaque d'immatriculation","rental_start_date":"Début de la location","rental_end_date":"Fin de la location","rental_distance":"Distance totale réglée (%{unit})","rental_distance_driven":"Distance totale parcourue (%{unit})","rental_earnings":"Virements reçus","rental":"Location","other_revenues":"Autres revenus","breakdown_fee":"Frais","compensation":"Dédomagements","remaining":"Autres","total":"Total : ","driver":"Locataire","owner_done":"Propriétaire - Effectués","owner_due":"Propriétaire - A venir","transfers":"Virements","total_subtitle":{"since_creation":"depuis votre inscription","since_creation_by_car":"depuis votre inscription pour votre %{car_title}","by_year":"en %{year}","by_year_and_car":"en %{year} pour votre %{car_title}"},"owner_revenue":{"including_rental":"Location :","including_other_revenues":"Autres revenus :","including_breakdown_fee":"Frais :","including_compensation":"Dédommagements :","including_remaining":"Autres ajustements :","including_open_subscription":"Abonnement Open :"}},"booking":{"errors":{"base":{"empty_field":"Merci de compléter ou corriger les informations ci-dessous (en rouge).","informations_invalid":"Merci de bien vérifier les informations manquantes ou invalides en rouge.","fetch_error":"Une erreur est survenue lors de la récupération du prix de la location. Veuillez réessayer."},"booking_card":{"required":"doit être rempli","invalid":"est invalide"},"conditions_acceptance":{"required":"Merci de lire les conditions d'utilisation de Getaround, et de confirmer que vous les acceptez en cochant ci-dessous."},"start_date":{"empty":"La date de début doit être remplie"},"end_date":{"empty":"La date de fin doit être remplie"},"cdw_level":{"empty":"Veuillez indiquer si vous souhaitez l'option réduction de franchise."},"distance":{"empty":"La distance doit être remplie"}},"rental_summary":{"cdw_html":"Réduction de franchise","no_options":"Pas d'option sélectionnée"}},"calendar":{"from":"du","to":"au","repeat":"Récurrence","repeat_options":{"zero":"Aucune","one":"Pendant %{count} mois","other":"Pendant %{count} mois"},"available":"Disponible","unavailable":"Indisponible","show_more_months":"Afficher les mois suivants"},"customer_service":{"damage_request":{"are_you_sure":"Etes-vous sûr de vouloir envoyer le formulaire tel quel ?"}},"datetimepicker":{"am":"avant 12h","pm":"après 12h"},"errors":{"not_valid":"%{stuff} n'est pas valide.","bad_request":"Une erreur est survenue.","unauthorized":"Vous n'êtes pas autorisé à accèder à la ressource.","forbidden":"Vous n'êtes pas autorisé à accèder à la ressource.","not_found":"Une erreur est survenue.","internal_server_error":"Une erreur est survenue sur notre serveur. Notre équipe technique a été prévenue.","error_occured":"Une erreur est survenue.","request_timeout":"Problème de connexion internet. Veuillez réessayer.","webcam_not_available":"Désolé, votre navigateur ne supporte pas l'accès à la webcam"},"magnific_popup":{"tClose":"Fermer (Esc)","tLoading":"Chargement en cours...","image":{"tError":"L'image n'a pas pu être chargée."},"ajax":{"tError":"Le contenu n'a pas pu être chargé."}},"picture_uploader":{"sending":"Envoi"},"profile":{"delete_account":"Êtes-vous certain de vouloir supprimer votre compte ?"},"textarea_maxlength":{"text":{"one":"%{count} caractère restant.","other":"%{count} caractères restants."}}},"pages":{"homepage":{"search_box":{"current_location":"Position actuelle"}}}},"trackingEnabled":true,"cookiesAcceptance":{"functional":true,"performance":true,"targeting":true},"googleConversionIds":{"owner":927657686,"driver":1018427586},"iterable":{"apiKey":null,"userCreatedAt":null},"mapsApiEndpoint":"https://maps.googleapis.com/maps/api/js?libraries=places\u0026language=fr\u0026v=3\u0026key=AIzaSyAsnQSjaFmgUUm5N_hbgMwY86uuVV6u9nk","mapsApiKey":"AIzaSyAsnQSjaFmgUUm5N_hbgMwY86uuVV6u9nk","momentLocaleOptions":{"months":["janvier","février","mars","avril","mai","juin","juillet","août","septembre","octobre","novembre","décembre"],"monthsShort":["jan.","fév.","mar.","avr.","mai","juin","juil.","août","sept.","oct.","nov.","déc."],"weekdays":["dimanche","lundi","mardi","mercredi","jeudi","vendredi","samedi"],"weekdaysShort":["dim","lun","mar","mer","jeu","ven","sam"],"week":{"dow":1,"doy":4}},"assetPaths":{"dashboard/cars/show/photos/loader.gif":"https://d2y2masl4rtrav.cloudfront.net/packs/images/dashboard/cars/show/photos/loader-a77ad337f7b926368d983142069303ae.gif","search/marker_empty@2x.png":"https://d2y2masl4rtrav.cloudfront.net/packs/images/search/marker_empty@2x-b4477d9a6350d39f7c0f40b9d749daae.png","car/marker_user@2x.png":"https://d2y2masl4rtrav.cloudfront.net/packs/images/car/marker_user@2x-615c8d8ec441e12f2c02e92b46771416.png","car/marker_car_precise.svg":"https://d2y2masl4rtrav.cloudfront.net/packs/images/car/marker_car_precise-3df2b6b0ab3be83dd63917a78dfcde13.svg","car/marker_car_approximate.svg":"https://d2y2masl4rtrav.cloudfront.net/packs/images/car/marker_car_approximate-16217125953d07855dcd2e606d7e8540.svg","shared/illustrations/repairman.png":"https://d2y2masl4rtrav.cloudfront.net/packs/images/shared/illustrations/repairman-01bee560c910547e6c7de8833980b005.png"},"carPhotoUploaderLargeDimensions":{"w":400,"h":280},"routes":{"request_availability_path":"/request_availability","legal_path":"/terms","uploads_settings_path":"/uploads_settings","dashboard_rentals_path":"/dashboard/rentals","tracking_page_path":"/tracking/page","tracking_event_path":"/tracking/event","autocomplete_address_path":"/autocomplete/address"},"tracking":{"googleAdsRemarketing":[{}]},"flashMessage":null}
    </script>

    <script>
      window.JUST_ON_TOUCH_DEVICES = true // Tocca.js
    </script>

    <script>!function(e){function r(r){for(var n,c,u=r[0],i=r[1],f=r[2],p=0,d=[];p<u.length;p++)c=u[p],Object.prototype.hasOwnProperty.call(o,c)&&o[c]&&d.push(o[c][0]),o[c]=0;for(n in i)Object.prototype.hasOwnProperty.call(i,n)&&(e[n]=i[n]);for(l&&l(r);d.length;)d.shift()();return a.push.apply(a,f||[]),t()}function t(){for(var e,r=0;r<a.length;r++){for(var t=a[r],n=!0,u=1;u<t.length;u++){var i=t[u];0!==o[i]&&(n=!1)}n&&(a.splice(r--,1),e=c(c.s=t[0]))}return e}var n={},o={0:0},a=[];function c(r){if(n[r])return n[r].exports;var t=n[r]={i:r,l:!1,exports:{}};return e[r].call(t.exports,t,t.exports,c),t.l=!0,t.exports}c.e=function(e){var r=[],t=o[e];if(0!==t)if(t)r.push(t[2]);else{var n=new Promise(function(r,n){t=o[e]=[r,n]});r.push(t[2]=n);var a,u=document.createElement("script");u.charset="utf-8",u.timeout=120,c.nc&&u.setAttribute("nonce",c.nc),u.src=function(e){return c.p+""+({}[e]||e)+"-"+{3:"45a0c1690a22ac656541",4:"3ea49d39c5a3241559f3",5:"142dc7d630a90d0b6406",6:"7d15d48cf5b85a4c5c2b",73:"91ea16b8e3c27a700786",74:"6b728335881fdb640332",75:"7a2ca9b0721b012b499c",76:"b98b2efb6a4aedfa3cce",77:"4f7b098837c88ed3c108",78:"ca10e183e8a929a311a2"}[e]+".js"}(e);var i=new Error;a=function(r){u.onerror=u.onload=null,clearTimeout(f);var t=o[e];if(0!==t){if(t){var n=r&&("load"===r.type?"missing":r.type),a=r&&r.target&&r.target.src;i.message="Loading chunk "+e+" failed.\n("+n+": "+a+")",i.name="ChunkLoadError",i.type=n,i.request=a,t[1](i)}o[e]=void 0}};var f=setTimeout(function(){a({type:"timeout",target:u})},12e4);u.onerror=u.onload=a,document.head.appendChild(u)}return Promise.all(r)},c.m=e,c.c=n,c.d=function(e,r,t){c.o(e,r)||Object.defineProperty(e,r,{enumerable:!0,get:t})},c.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},c.t=function(e,r){if(1&r&&(e=c(e)),8&r)return e;if(4&r&&"object"==typeof e&&e&&e.__esModule)return e;var t=Object.create(null);if(c.r(t),Object.defineProperty(t,"default",{enumerable:!0,value:e}),2&r&&"string"!=typeof e)for(var n in e)c.d(t,n,function(r){return e[r]}.bind(null,n));return t},c.n=function(e){var r=e&&e.__esModule?function(){return e.default}:function(){return e};return c.d(r,"a",r),r},c.o=function(e,r){return Object.prototype.hasOwnProperty.call(e,r)},c.p="/packs/",c.oe=function(e){throw e};var u=window.webpackJsonp=window.webpackJsonp||[],i=u.push.bind(u);u.push=r,u=u.slice();for(var f=0;f<u.length;f++)r(u[f]);var l=i;t()}([]);

    </script>
    </div>




    <fieldset>
      <legend>En route !</legend>
      <div class="form-group">
        <div class="row">
          <label for="date-picker">Du : </label>
          <input type="text" name="daterange" value="<?php echo $sToday->format('m/d/Y').' - '.$sAWeek->format('m/d/Y'); ?>" id="date-picker"/>
          <label for="cities-select">À partir de : </label>
          <select class="custom-select" id="cities-select" name="cities">
            <option selected value="447">Paris</option>
            @foreach ($aCities as $key => $row)
              <option value="{{ $key }}">{{ $row }}</option>
            @endforeach
          </select>
          <label for="categories-select">Car / Scooter : </label>
          <select class="custom-select" id="categories-select" name="categories">
            <option selected value="car">Car</option>
            <option value="scooter">Scooter</option>
            <option value="">Car and Scooter</option>
          </select>
          <button type="submit" id="book" class="btn btn-info">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </fieldset>
    <div class=" flex-center">
      <p>Filter settings:</p>

      <div>
        <input type="range" id="price_start" name="price_start" min="10" max="100" value="10" step="1">
        <span id="price_start_value"></span>
        <label for="price_start">Price Min</label>
      </div>

      <div>
        <input type="range" id="price_end" name="price_end" min="100" max="1000" value="150" step="1">
        <span id="price_end_value"></span>
        <label for="price_end">Price Max</label>
      </div>
    </div>

    <div id="result-content" class="bottom-height flex-center">
      {{--   Search Result zone   --}}

    </div>

  </body>
</html>
