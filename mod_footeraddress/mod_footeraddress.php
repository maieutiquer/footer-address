<?php
// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

$footerItems = modFooterAddressHelper::getfooterItems( $params );
$showSeparators = modFooterAddressHelper::getShowSeparators( $params );
$separatorChar = modFooterAddressHelper::getSeparatorChar( $params );
require( JModuleHelper::getLayoutPath( 'mod_footeraddress' ) );
