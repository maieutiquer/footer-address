<?php defined( '_JEXEC' ) or die( 'Restricted access' );

// replaces the last occurence of a string
function str_lreplace($search, $replace, $subject)
{
    $pos = strrpos($subject, $search);

    if($pos !== false)
    {
        $subject = substr_replace($subject, $replace, $pos, strlen($search));
    }

    return $subject;
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
	if ($footerItems['street']) {
		$markup.= '<span itemprop="streetAddress">'.$footerItems['street'].'</span>';
	}
	if ($footerItems['postalcode']) {
		// no separator after postal code
		$markup.= '<span itemprop="postalCode">'.$footerItems['postalcode'].'</span >';
	}
	if ($footerItems['locality']) {
		$markup.= '<span itemprop="addressLocality">'.$footerItems['locality'].'</span>';
	}
	if ($footerItems['country']) {
		$markup.= '<span itemprop="addressCountry">'.$footerItems['country'].'</span>';
	}
	$markup.= '</div>';
}
if ($footerItems['mobile']) {
	$markup.= '<span itemprop="telephone">'.$footerItems['mobile'].'</span>';
}
if ($footerItems['landline']) {
	$markup.= '<span itemprop="telephone">'.$footerItems['landline'].'</span>';
}
if ($footerItems['fax']) {
	$markup.= '<span itemprop="faxNumber">'.$footerItems['fax'].'</span>';
}
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
