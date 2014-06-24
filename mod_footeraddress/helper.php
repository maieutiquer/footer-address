<?php

class modFooterAddressHelper
{
    /**
     * Retrieves the info to show as footer
     *
     * @param array $params An object containing the module parameters
     * @access public
     */    
    public static function getFooterInfo( $params )
    {
        $footerInfo = array(
                $params->get('name'),
                $params->get('address_street'),
                $params->get('address_postcode'),
                $params->get('address_locality'),
                $params->get('address_country'),
                $params->get('mobile'),
                $params->get('landline'),
                $params->get('email'),
                $params->get('more'),
                );
        return $footerInfo;
    }
}