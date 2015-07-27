<?php
return array( 

    /*
    |--------------------------------------------------------------------------
    | oAuth Config
    |--------------------------------------------------------------------------
    */

    /**
     * Storage
     */
    'storage' => 'Session', 

    /**
     * Consumers
     */
    'consumers' => array(

        /**
         * Facebook
         */
        'Facebook' => array(
            'client_id'     => '1536226246625315',
            'client_secret' => 'cd9a1324b48addacfa25f99105ae3ba7',
            'scope'         => array('email','read_friendlists','user_online_presence'),
        ),      

        'Google' => array(
            'client_id'     => '457159988616-c8crhbit47pmvhj4aas8gsgu3vfp851r.apps.googleusercontent.com',
            'client_secret' => 'hUy0EytXXp2WC5MTUZgfYl3F',
            'scope'         => array('userinfo_email', 'userinfo_profile'),
        ), 

        'Linkedin' => array(
            'client_id'     => '75kkgvn3q5hz8l',
            'client_secret' => 'ubGWAfw6PpeApVwX',
        ),  

        'Yahoo' => array(
            'client_id'     => 'dj0yJmk9amE4QjhPMUo5ZExjJmQ9WVdrOVRuQm5UelZzTjJrbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmeD0xMQ--',
            'client_secret' => 'e9b961955169db44ff798959472a8d1cb1d92d4c',  
        ),  


    )

);