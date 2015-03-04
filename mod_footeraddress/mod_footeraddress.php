<?php
// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

$objectType = modFooterAddressHelper::getObjectType( $params );
$showSeparators = modFooterAddressHelper::getShowSeparators( $params );
$separatorChar = modFooterAddressHelper::getSeparatorChar( $params );
$footerItems = modFooterAddressHelper::getfooterItems( $params );
require( JModuleHelper::getLayoutPath( 'mod_footeraddress' ) );
