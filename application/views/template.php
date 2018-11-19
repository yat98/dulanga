<?php
    // HEADER
    if(!empty($header)){
        $this->load->view($header);
    }

    // CONTENT
    $this->load->view($content);

    // FOOTER
    if(!empty($footer)){
        $this->load->view($footer); 
    }
?>