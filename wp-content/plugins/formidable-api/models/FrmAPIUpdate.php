<?php

class FrmAPIUpdate{
    var $plugin_nicename;
    var $plugin_name;
    var $pro_check_interval;
    var $pro_last_checked_store;

    function FrmAPIUpdate() {
        if (!class_exists('FrmUpdatesController')) return;
        
        // Where all the vitals are defined for this plugin
        $this->plugin_nicename      = 'formidable-api';
        $this->plugin_name          = 'formidable-api/formidable-api.php';
        $this->pro_last_checked_store = 'frmapi_last_check';
        $this->pro_check_interval   = 60*60*24; // Checking every 24 hours

        add_filter('site_transient_update_plugins', array( &$this, 'queue_update' ) );
    }
    
    function queue_update($transient, $force = false) {
        $plugin = $this;
        global $frm_update;
        if ( !$frm_update ) {
            $frm_update = new FrmUpdatesController();
        }
        return $frm_update->queue_addon_update($transient, $plugin, $force);
    }

}