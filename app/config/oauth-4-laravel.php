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
            'client_id'     => '741792749264119',
            'client_secret' => '0d02714a5dd1b25504f1bba6a7a9a8f3',
            'scope'         => array('email','read_friendlists'),
        ),      

        'Google' => array(
            'client_id'     => 'Your Google client ID',
            'client_secret' => 'Your Google Client Secret',
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