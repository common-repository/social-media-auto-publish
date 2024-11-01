<?php
if (!function_exists("xyz_smap_fb_get_album")) {
    function xyz_smap_fb_get_album($xyz_fb_params_enc)
    {
      $xyz_fb_params=json_decode($xyz_fb_params_enc,true);
      $xyz_fb_page_id=$xyz_fb_params[0];
      $xyz_fb_disp_type=$xyz_fb_params[1];
      $xyz_fb_acces_token=$xyz_fb_params[2];
      $xyz_fb_sslverify=$xyz_fb_params[3];
      $url="https://graph.facebook.com/".XYZ_SMAP_FB_API_VERSION."/{$xyz_fb_page_id}/{$xyz_fb_disp_type}?access_token={$xyz_fb_acces_token}";
      $response = wp_remote_get($url,array('sslverify'=>$xyz_fb_sslverify));
      if (is_wp_error($response)) {
          return $response->get_error_message();
      } else {
          return wp_remote_retrieve_body($response);
      }
    }
}
if (!function_exists("xyz_smap_make_fb_post")) {
    function xyz_smap_make_fb_post($xyz_fb_params_enc)
    {
      $xyz_fb_params=json_decode($xyz_fb_params_enc,true);
      $xyz_fb_page_id=$xyz_fb_params[0];
      $xyz_fb_disp_type=$xyz_fb_params[1];
      $xyz_fb_attachment=$xyz_fb_params[2];
      $xyz_fb_sslverify=$xyz_fb_params[3];
      $url = "https://graph.facebook.com/".XYZ_SMAP_FB_API_VERSION."/{$xyz_fb_page_id}/{$xyz_fb_disp_type}";
      $response = wp_remote_post($url, array('timeout' => 10,
          'body' => $xyz_fb_attachment,
          'sslverify'=>$xyz_fb_sslverify
      ));
      if (is_wp_error($response)) {
          return $response->get_error_message();
      } else {
          return wp_remote_retrieve_body($response);
      }
    }
}
if (!function_exists("xyz_smap_scrape_url")) {
    function xyz_smap_scrape_url($xyz_fb_params_enc,$smap_sslverify)
    {
      $xyz_fb_params=json_decode($xyz_fb_params_enc,true);
      $url = "https://graph.facebook.com/".XYZ_SMAP_FB_API_VERSION."/";
      $response = wp_remote_post($url, array(
          'body' => $xyz_fb_params,
          'sslverify'=>$smap_sslverify
      ));
      if (is_wp_error($response)) {
          return $response->get_error_message();
      } else {
          return wp_remote_retrieve_body($response);
      }
    }
}
?>
