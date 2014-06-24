<?php defined( '_JEXEC' ) or die( 'Restricted access' );

$showName = isset($footerInfo[0]);
$showAddress = isset($footerInfo[1]) || isset($footerInfo[2]) || isset($footerInfo[3]) || isset($footerInfo[4]);
    $showStreet = isset($footerInfo[1]);
    $showPostalCode = isset($footerInfo[2]);
    $showLocality = isset($footerInfo[3]);
    $showCountry = isset($footerInfo[4]);
$showMobile = isset($footerInfo[5]);
$showLandline = isset($footerInfo[6]);
$showFax = isset($footerInfo[7]);
$showEmail = isset($footerInfo[8]);
$showAdditional = isset($footerInfo[9]);

$markup = '';

$markup.= '<address class="footer-address" itemscope itemtype="http://schema.org/Organization">';
    if ($showName) {
        $markup.= '<a id="homepage-link-footer" href="."><span itemprop="name">'.$footerInfo[0].'</span></a> ';
    }
    if ($showAddress) {
        $markup.= '<span id="postal-address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">';
        if ($showStreet) {
            $markup.= '<span itemprop="streetAddress">'.$footerInfo[1].'</span> ';
        }
        if ($showPostalCode) {
            $markup.= '<span itemprop="postalCode">'.$footerInfo[2].'</span> ';
        }
        if ($showLocality) {
            $markup.= '<span itemprop="addressLocality">'.$footerInfo[3].'</span> ';
        }
        if ($showCountry) {
            $markup.= '<span itemprop="addressCountry">'.$footerInfo[4].'</span>';
        }
        $markup.= '</span> ';
    }
    if ($showMobile) {
        $markup.= '<span itemprop="telephone">'.$footerInfo[5].'</span> ';
    }
    if ($showLandline) {
        $markup.= '<span itemprop="telephone">'.$footerInfo[6].'</span> ';
    }
    if ($showFax) {
        $markup.= '<span itemprop="faxNumber">'.$footerInfo[7].'</span> ';
    }
    if ($showEmail) {
        $markup.= '<a id="site-email-footer" href="mailto:'.$footerInfo[8].'"><span itemprop="email">'.$footerInfo[8].'</span></a> ';
    }
    if ($showAdditional) {
        $markup.= '<span>'.$footerInfo[9].'</span> ';
    }
/*
    <a id="site-email-footer" href="mailto:info@konsept.ch">
        <span itemprop="email">info@konsept.ch</span>
    </a>
</address>
*/

$markup.= '</address>';
echo $markup;