<?php defined( '_JEXEC' ) or die( 'Restricted access' );

$markup = '';

$separator = '';
if ($showSeparators) {
  $separator = $separatorChar;
}

$nonempty = count(array_filter($footerInfo));
$separatorCounter =  $nonempty;

// y u no work?
function printSeparator() {
  global $markup, $separatorCounter, $separator;
  echo $separator;
  if ($separatorCounter > 0) {
    $markup.= $separator;
    $separatorCounter--;
  }
}

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


$markup.= '<address class="footer-address" itemscope itemtype="http://schema.org/Organization">';
$separatorCounter--;
if ($showName) {
  $markup.= '<a id="homepage-link-footer" href="."><span itemprop="name">'.$footerInfo[0].'</span></a> ';
  printSeparator();
}
if ($showAddress) {
  $markup.= '<span id="postal-address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">';
  if ($showStreet) {
    $markup.= '<span itemprop="streetAddress">'.$footerInfo[1].'</span> ';
    printSeparator();
  }
  if ($showPostalCode) {
    $markup.= '<span itemprop="postalCode">'.$footerInfo[2].'</span> ';
    printSeparator();
  }
  if ($showLocality) {
    $markup.= '<span itemprop="addressLocality">'.$footerInfo[3].'</span> ';
    printSeparator();
  }
  if ($showCountry) {
    $markup.= '<span itemprop="addressCountry">'.$footerInfo[4].'</span>';
  }
  $markup.= '</span> ';
  printSeparator();
}
if ($showMobile) {
  $markup.= '<span itemprop="telephone">'.$footerInfo[5].'</span> ';
  printSeparator();
}
if ($showLandline) {
  $markup.= '<span itemprop="telephone">'.$footerInfo[6].'</span> ';
  printSeparator();
}
if ($showFax) {
  $markup.= '<span itemprop="faxNumber">'.$footerInfo[7].'</span> ';
  printSeparator();
}
if ($showEmail) {
  $markup.= '<a id="site-email-footer" href="mailto:'.$footerInfo[8].'"><span itemprop="email">'.$footerInfo[8].'</span></a> ';
  printSeparator();
}
if ($showAdditional) {
  $markup.= '<span>'.$footerInfo[9].'</span> ';
}

$markup.= '</address>';
echo $markup;
