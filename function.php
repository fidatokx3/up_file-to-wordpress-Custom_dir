<?php
//file upload to desire location
  function fn_upload_file() {
     if ( isset($_POST['upload_file']) ) {
        $upload_dir = wp_upload_dir();

         if ( ! empty( $upload_dir['basedir'] ) ) {
             $user_dirname = $upload_dir['basedir'].'/2023/07';
             if ( ! file_exists( $user_dirname ) ) {
                 wp_mkdir_p( $user_dirname );
             }

            //$filename = wp_unique_filename( $user_dirname, $_FILES['file']['name'] );
            $filename = 'flight.png';
            move_uploaded_file($_FILES['file']['tmp_name'], $user_dirname .'/'. $filename);
             // save into database $upload_dir['baseurl'].'/product-images/'.$filename;
         }
     }
 }
  add_action('init', 'fn_upload_file');
