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

$name = ($footerInfo[0]);
$address = isset($footerInfo[1]) || isset($footerInfo[2]) || isset($footerInfo[3]) || isset($footerInfo[4]);
  $street = ($footerInfo[1]);
  $postalCode = ($footerInfo[2]);
  $locality = ($footerInfo[3]);
  $country = ($footerInfo[4]);
$mobile = ($footerInfo[5]);
$landline = ($footerInfo[6]);
$fax = ($footerInfo[7]);
$email = ($footerInfo[8]);
$additional = ($footerInfo[9]);
$description = ($footerInfo[10]);


$markup.= '<address class="footer-address" itemscope itemtype="http://schema.org/Organization">';
$separatorCounter--;
if ($name) {
  $markup.= '<a id="homepage-link-footer" href="."><span itemprop="name">'.$name.'</span></a> ';
  printSeparator();
}
if ($description) {
  $markup.= '<span class="footer-description">'.$description.'</span> ';
  printSeparator();
}
if ($address) {
  $markup.= '<span id="postal-address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">';
  if ($street) {
    $markup.= '<span itemprop="streetAddress">'.$street.'</span> ';
    printSeparator();
  }
  if ($postalCode) {
    $markup.= '<span itemprop="postalCode">'.$postalCode.'</span> ';
    printSeparator();
  }
  if ($locality) {
    $markup.= '<span itemprop="addressLocality">'.$locality.'</span> ';
    printSeparator();
  }
  if ($country) {
    $markup.= '<span itemprop="addressCountry">'.$country.'</span>';
  }
  $markup.= '</span> ';
  printSeparator();
}
if ($mobile) {
  $markup.= '<span itemprop="telephone">'.$mobile.'</span> ';
  printSeparator();
}
if ($landline) {
  $markup.= '<span itemprop="telephone">'.$landline.'</span> ';
  printSeparator();
}
if ($fax) {
  $markup.= '<span itemprop="faxNumber">'.$fax.'</span> ';
  printSeparator();
}
if ($email) {
  $markup.= '<a id="site-email-footer" href="mailto:'.$email.'"><span itemprop="email">'.$email.'</span></a> ';
  printSeparator();
}
if ($additional) {
  $markup.= '<span class="footer-additional">'.$additional.'</span> ';
}

$markup.= '</address>';
echo $markup;
