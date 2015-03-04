<?php defined( '_JEXEC' ) or die( 'Restricted access' );

// replaces the last occurence of a string
function str_lreplace($search, $replace, $subject) {
	$pos = strrpos($subject, $search);

	if($pos !== false) {
		$subject = substr_replace($subject, $replace, $pos, strlen($search));
	}

	return $subject;
}

function showFooterItem($footerItemName, $itemprop, $footerItems, $showSeparator = true) {
	$itemMarkup = '';
	$disableSeparator = '';
	if ($showSeparator == false) {
		$disableSeparator = ' ';
	}
	if ($footerItems[$footerItemName]) {
		$itemMarkup .= '<span itemprop="'.$itemprop.'">'.$footerItems[$footerItemName].'</span'.$disableSeparator.'>';
	}
	return $itemMarkup;
}

$markup = '';

$itemsCount = count(array_filter($footerItems));

$showAddress = (
		$footerItems['street']
		|| $footerItems['postalcode']
		|| $footerItems['locality']
		|| $footerItems['country']
	);

$markup.= '<address class="footer-address" itemscope itemtype="http://schema.org/Organization">';
if ($footerItems['name']) {
	$markup.= '<a id="homepage-link-footer" href="."><span itemprop="name">'.$footerItems['name'].'</span></a>';
}
if ($footerItems['description']) {
	$markup.= '<span class="footer-description">'.$footerItems['description'].'</span>';
}
if ($showAddress) {
	$markup.= '<div id="postal-address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">';
	$markup.= showFooterItem('street', 'streetAddress', $footerItems);
	$markup.= showFooterItem('postalcode', 'postalCode', $footerItems, false);
	$markup.= showFooterItem('locality', 'addressLocality', $footerItems);
	$markup.= showFooterItem('country', 'addressCountry', $footerItems);
	$markup.= '</div>';
}
$markup.= showFooterItem('mobile', 'telephone', $footerItems);
$markup.= showFooterItem('landline', 'telephone', $footerItems);
$markup.= showFooterItem('fax', 'faxNumber', $footerItems);
if ($footerItems['email']) {
	$markup.= '<a id="site-email-footer" href="mailto:'.$footerItems['email'].'"><span itemprop="email">'.$footerItems['email'].'</span></a>';
}
if ($footerItems['more']) {
	$markup.= '<span class="footer-additional">'.$footerItems['more'].'</span>';
}
$markup.= '</address>';

if ($showSeparators) {
	// add separator after closing span tag
	$markup = str_replace(
			'</span>',
			'</span><span class="separator">'.$separatorChar.'</span>',
			$markup,
			$separatorsCount
		);
	// remove last separator
	$markup = str_lreplace(
			'<span class="separator">'.$separatorChar.'</span>',
			'',
			$markup
		);
}

echo $markup;
