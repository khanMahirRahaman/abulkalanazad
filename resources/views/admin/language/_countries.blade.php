<script>
    let countries = [{id:"AD",text:"Andorra"},{id:"AE",text:"United Arab Emirates"},{id:"AF",text:"Afghanistan"},{id:"AG",text:"Antigua & Barbuda"},{id:"AI",text:"Anguilla"},{id:"AL",text:"Albania"},{id:"AM",text:"Armenia"},{id:"AO",text:"Angola"},{id:"AQ",text:"Antarctica"},{id:"AR",text:"Argentina"},{id:"AS",text:"American Samoa"},{id:"AT",text:"Austria"},{id:"AU",text:"Australia"},{id:"AW",text:"Aruba"},{id:"AX",text:"Aland Islands"},{id:"AZ",text:"Azerbaijan"},{id:"BA",text:"Bosnia & Herzegovina"},{id:"BB",text:"Barbados"},{id:"BD",text:"Bangladesh"},{id:"BE",text:"Belgium"},{id:"BF",text:"Burkina Faso"},{id:"BG",text:"Bulgaria"},{id:"BH",text:"Bahrain"},{id:"BI",text:"Burundi"},{id:"BJ",text:"Benin"},{id:"BL",text:"St. Barthelemy"},{id:"BM",text:"Bermuda"},{id:"BN",text:"Brunei"},{id:"BO",text:"Bolivia"},{id:"BQ",text:"Caribbean Netherlands"},{id:"BR",text:"Brazil"},{id:"BS",text:"Bahamas"},{id:"BT",text:"Bhutan"},{id:"BV",text:"Bouvet Island"},{id:"BW",text:"Botswana"},{id:"BY",text:"Belarus"},{id:"BZ",text:"Belize"},{id:"CA",text:"Canada"},{id:"CC",text:"Cocos Islands"},{id:"CD",text:"Congo - Kinshasa"},{id:"CF",text:"Central African Republic"},{id:"CG",text:"Congo - Brazzaville"},{id:"CH",text:"Switzerland"},{id:"CI",text:"Ivory Coast"},{id:"CK",text:"Cook Islands"},{id:"CL",text:"Chile"},{id:"CM",text:"Cameroon"},{id:"CN",text:"China"},{id:"CO",text:"Colombia"},{id:"CR",text:"Costa Rica"},{id:"CU",text:"Cuba"},{id:"CV",text:"Cape Verde"},{id:"CW",text:"Curaçao"},{id:"CX",text:"Christmas Island"},{id:"CY",text:"Cyprus"},{id:"CZ",text:"Czechia"},{id:"DE",text:"Germany"},{id:"DJ",text:"Djibouti"},{id:"DK",text:"Denmark"},{id:"DM",text:"Dominica"},{id:"DO",text:"Dominican Republic"},{id:"DZ",text:"Algeria"},{id:"EC",text:"Ecuador"},{id:"EE",text:"Estonia"},{id:"EG",text:"Egypt"},{id:"EH",text:"Western Sahara"},{id:"ER",text:"Eritrea"},{id:"ES",text:"Spain"},{id:"ET",text:"Ethiopia"},{id:"FI",text:"Finland"},{id:"FJ",text:"Fiji"},{id:"FK",text:"Falkland Islands"},{id:"FM",text:"Micronesia"},{id:"FO",text:"Faroe Islands"},{id:"FR",text:"France"},{id:"GA",text:"Gabon"},{id:"GB",text:"United Kingdom"},{id:"GD",text:"Grenada"},{id:"GE",text:"Georgia"},{id:"GF",text:"French Guiana"},{id:"GG",text:"Guernsey"},{id:"GH",text:"Ghana"},{id:"GI",text:"Gibraltar"},{id:"GL",text:"Greenland"},{id:"GM",text:"Gambia"},{id:"GN",text:"Guinea"},{id:"GP",text:"Guadeloupe"},{id:"GQ",text:"Equatorial Guinea"},{id:"GR",text:"Greece"},{id:"GT",text:"Guatemala"},{id:"GU",text:"Guam"},{id:"GW",text:"Guinea-Bissau"},{id:"GY",text:"Guyana"},{id:"HK",text:"Hong Kong"},{id:"HN",text:"Honduras"},{id:"HR",text:"Croatia"},{id:"HT",text:"Haiti"},{id:"HU",text:"Hungary"},{id:"ID",text:"Indonesia"},{id:"IE",text:"Ireland"},{id:"IL",text:"Israel"},{id:"IM",text:"Isle of Man"},{id:"IN",text:"India"},{id:"IO",text:"British Indian Ocean Territory"},{id:"IQ",text:"Iraq"},{id:"IR",text:"Iran"},{id:"IS",text:"Iceland"},{id:"IT",text:"Italy"},{id:"JE",text:"Jersey"},{id:"JM",text:"Jamaica"},{id:"JO",text:"Jordan"},{id:"JP",text:"Japan"},{id:"KE",text:"Kenya"},{id:"KG",text:"Kyrgyzstan"},{id:"KH",text:"Cambodia"},{id:"KI",text:"Kiribati"},{id:"KM",text:"Comoros"},{id:"KN",text:"St. Kitts & Nevis"},{id:"KP",text:"North Korea"},{id:"KR",text:"South Korea"},{id:"KW",text:"Kuwait"},{id:"KY",text:"Cayman Islands"},{id:"KZ",text:"Kazakhstan"},{id:"LA",text:"Laos"},{id:"LB",text:"Lebanon"},{id:"LC",text:"St. Lucia"},{id:"LI",text:"Liechtenstein"},{id:"LK",text:"Sri Lanka"},{id:"LR",text:"Liberia"},{id:"LS",text:"Lesotho"},{id:"LT",text:"Lithuania"},{id:"LU",text:"Luxembourg"},{id:"LV",text:"Latvia"},{id:"LY",text:"Libya"},{id:"MA",text:"Morocco"},{id:"MC",text:"Monaco"},{id:"MD",text:"Moldova"},{id:"ME",text:"Montenegro"},{id:"MF",text:"St. Martin"},{id:"MG",text:"Madagascar"},{id:"MH",text:"Marshall Islands"},{id:"MK",text:"North Macedonia"},{id:"ML",text:"Mali"},{id:"MM",text:"Myanmar"},{id:"MN",text:"Mongolia"},{id:"MO",text:"Macao"},{id:"MP",text:"Northern Mariana Islands"},{id:"MQ",text:"Martinique"},{id:"MR",text:"Mauritania"},{id:"MS",text:"Montserrat"},{id:"MT",text:"Malta"},{id:"MU",text:"Mauritius"},{id:"MV",text:"Maldives"},{id:"MW",text:"Malawi"},{id:"MX",text:"Mexico"},{id:"MY",text:"Malaysia"},{id:"MZ",text:"Mozambique"},{id:"NA",text:"Namibia"},{id:"NC",text:"New Caledonia"},{id:"NE",text:"Niger"},{id:"NF",text:"Norfolk Islands"},{id:"NG",text:"Nigeria"},{id:"NI",text:"Nicaragua"},{id:"NL",text:"Netherlands"},{id:"NO",text:"Norway"},{id:"NP",text:"Nepal"},{id:"NR",text:"Nauru"},{id:"NU",text:"Niue"},{id:"NZ",text:"New Zealand"},{id:"OM",text:"Oman"},{id:"PA",text:"Panama"},{id:"PE",text:"Peru"},{id:"PF",text:"French Polynesia"},{id:"PG",text:"Papua New Guinea"},{id:"PH",text:"Philippines"},{id:"PK",text:"Pakistan"},{id:"PL",text:"Poland"},{id:"PM",text:"St. Pierre & Miquelon"},{id:"PN",text:"Pitcairn Islands"},{id:"PR",text:"Puerto Rico"},{id:"PS",text:"Palestine"},{id:"PT",text:"Portugal"},{id:"PW",text:"Palau"},{id:"PY",text:"Paraguay"},{id:"QA",text:"Qatar"},{id:"RE",text:"Réunion"},{id:"RO",text:"Romania"},{id:"RS",text:"Serbia"},{id:"RU",text:"Russia"},{id:"RW",text:"Rwanda"},{id:"SA",text:"Saudi Arabia"},{id:"SB",text:"Solomon Islands"},{id:"SC",text:"Seychelles"},{id:"SD",text:"Sudan"},{id:"SE",text:"Sweden"},{id:"SG",text:"Singapore"},{id:"SH",text:"St. Helena"},{id:"SI",text:"Slovenia"},{id:"SJ",text:"Svalbard & Jan Mayen"},{id:"SK",text:"Slovakia"},{id:"SL",text:"Sierra Leone"},{id:"SM",text:"San Marino"},{id:"SN",text:"Senegal"},{id:"SO",text:"Somalia"},{id:"SR",text:"Suriname"},{id:"SS",text:"South Sudan"},{id:"ST",text:"São Tomé and Príncipe"},{id:"SV",text:"El Salvador"},{id:"SX",text:"Sint Maarteen"},{id:"SY",text:"Syria"},{id:"SZ",text:"Eswatini"},{id:"TC",text:"Turk & Caicos Islands"},{id:"TD",text:"Chad"},{id:"TG",text:"Togo"},{id:"TH",text:"Thailand"},{id:"TJ",text:"Tajikistan"},{id:"TK",text:"Tokelau"},{id:"TL",text:"Timor Leste"},{id:"TM",text:"Turkmenistan"},{id:"TN",text:"Tunisia"},{id:"TO",text:"Tonga"},{id:"TR",text:"Turkey"},{id:"TT",text:"Trinidad & Tobago"},{id:"TV",text:"Tuvalu"},{id:"TW",text:"Taiwan"},{id:"TZ",text:"Tanzania"},{id:"UA",text:"Ukraine"},{id:"UG",text:"Uganda"},{id:"UM",text:"U.S. Outlying Islands"},{id:"US",text:"United States"},{id:"UY",text:"Uruguay"},{id:"UZ",text:"Uzbekistan"},{id:"VA",text:"Vatican City"},{id:"VC",text:"St. Vincent & Grenadines"},{id:"VE",text:"Venezuela"},{id:"VG",text:"British Virgin Islands"},{id:"VI",text:"U.S. Virgin Islands"},{id:"VN",text:"Vietnam"},{id:"VU",text:"Vanuatu"},{id:"WF",text:"Wallis & Futuna"},{id:"WS",text:"Samoa"},{id:"XK",text:"Kosovo"},{id:"YE",text:"Yemen"},{id:"YT",text:"Mayotte"},{id:"ZA",text:"South Africa"},{id:"ZM",text:"Zambia"},{id:"ZW",text:"Zimbabwe"}]
</script>
