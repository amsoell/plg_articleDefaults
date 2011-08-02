<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

class plgContentArticleDefaults extends JPlugin {
    public $params;
    
    function plgContentArticleDefaults( &$subject, $params) {
        $this->params = $params;
        parent::__construct( $subject, $params );
    }
    
    function onContentBeforeSave($context, &$article, $isNew ) {
        global $mainframe;
        
        if ($isNew) {
            if (strlen(trim($this->params->get("state")))>0) 
                $article->state = $this->params->get("state");
            if (strlen(trim($this->params->get("access")))>0) 
                $article->access = $this->params->get("access");
        }

        return true;
    }	

}
