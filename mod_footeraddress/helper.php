<?php

class modFooterAddressHelper
{
	/**
	 * Retrieves the info to show as footer
	 *
	 * @param array $params An object containing the module parameters
	 * @access public
	 */
	public static function getfooterItems( $params )
	{
		$footerItems = array(
				'name' => $params->get('name'),
				'description' => $params->get('description'),
				'street' => $params->get('address_street'),
				'postalcode' => $params->get('address_postcode'),
				'locality' => $params->get('address_locality'),
				'country' => $params->get('address_country'),
				'mobile' => $params->get('mobile'),
				'landline' => $params->get('landline'),
				'fax' => $params->get('fax'),
				'email' => $params->get('email'),
				'more' => $params->get('more'),
				);
		return $footerItems;
	}

	public static function getShowSeparators( $params )
	{
		return $params->get('show_separators');
	}
	public static function getSeparatorChar( $params )
	{
		return $params->get('separator_char');
	}
}
