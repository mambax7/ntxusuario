<?php

/* -*- Mode: C; indent-tabs-mode: t; c-basic-offset: 2; tab-width: 2 -*- */

/* geoip.inc
 *
 * Copyright (C) 2004 MaxMind LLC
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

global $GEOIP_COUNTRY_CODE_TO_NUMBER, $GEOIP_COUNTRY_CODES, $GEOIP_COUNTRY_NAMES;

$GEOIP_COUNTRY_CODE_TO_NUMBER = [
    ''   => 0,
    'AP' => 1,
    'EU' => 2,
    'AD' => 3,
    'AE' => 4,
    'AF' => 5,
    'AG' => 6,
    'AI' => 7,
    'AL' => 8,
    'AM' => 9,
    'AN' => 10,
    'AO' => 11,
    'AQ' => 12,
    'AR' => 13,
    'AS' => 14,
    'AT' => 15,
    'AU' => 16,
    'AW' => 17,
    'AZ' => 18,
    'BA' => 19,
    'BB' => 20,
    'BD' => 21,
    'BE' => 22,
    'BF' => 23,
    'BG' => 24,
    'BH' => 25,
    'BI' => 26,
    'BJ' => 27,
    'BM' => 28,
    'BN' => 29,
    'BO' => 30,
    'BR' => 31,
    'BS' => 32,
    'BT' => 33,
    'BV' => 34,
    'BW' => 35,
    'BY' => 36,
    'BZ' => 37,
    'CA' => 38,
    'CC' => 39,
    'CD' => 40,
    'CF' => 41,
    'CG' => 42,
    'CH' => 43,
    'CI' => 44,
    'CK' => 45,
    'CL' => 46,
    'CM' => 47,
    'CN' => 48,
    'CO' => 49,
    'CR' => 50,
    'CU' => 51,
    'CV' => 52,
    'CX' => 53,
    'CY' => 54,
    'CZ' => 55,
    'DE' => 56,
    'DJ' => 57,
    'DK' => 58,
    'DM' => 59,
    'DO' => 60,
    'DZ' => 61,
    'EC' => 62,
    'EE' => 63,
    'EG' => 64,
    'EH' => 65,
    'ER' => 66,
    'ES' => 67,
    'ET' => 68,
    'FI' => 69,
    'FJ' => 70,
    'FK' => 71,
    'FM' => 72,
    'FO' => 73,
    'FR' => 74,
    'FX' => 75,
    'GA' => 76,
    'GB' => 77,
    'GD' => 78,
    'GE' => 79,
    'GF' => 80,
    'GH' => 81,
    'GI' => 82,
    'GL' => 83,
    'GM' => 84,
    'GN' => 85,
    'GP' => 86,
    'GQ' => 87,
    'GR' => 88,
    'GS' => 89,
    'GT' => 90,
    'GU' => 91,
    'GW' => 92,
    'GY' => 93,
    'HK' => 94,
    'HM' => 95,
    'HN' => 96,
    'HR' => 97,
    'HT' => 98,
    'HU' => 99,
    'ID' => 100,
    'IE' => 101,
    'IL' => 102,
    'IN' => 103,
    'IO' => 104,
    'IQ' => 105,
    'IR' => 106,
    'IS' => 107,
    'IT' => 108,
    'JM' => 109,
    'JO' => 110,
    'JP' => 111,
    'KE' => 112,
    'KG' => 113,
    'KH' => 114,
    'KI' => 115,
    'KM' => 116,
    'KN' => 117,
    'KP' => 118,
    'KR' => 119,
    'KW' => 120,
    'KY' => 121,
    'KZ' => 122,
    'LA' => 123,
    'LB' => 124,
    'LC' => 125,
    'LI' => 126,
    'LK' => 127,
    'LR' => 128,
    'LS' => 129,
    'LT' => 130,
    'LU' => 131,
    'LV' => 132,
    'LY' => 133,
    'MA' => 134,
    'MC' => 135,
    'MD' => 136,
    'MG' => 137,
    'MH' => 138,
    'MK' => 139,
    'ML' => 140,
    'MM' => 141,
    'MN' => 142,
    'MO' => 143,
    'MP' => 144,
    'MQ' => 145,
    'MR' => 146,
    'MS' => 147,
    'MT' => 148,
    'MU' => 149,
    'MV' => 150,
    'MW' => 151,
    'MX' => 152,
    'MY' => 153,
    'MZ' => 154,
    'NA' => 155,
    'NC' => 156,
    'NE' => 157,
    'NF' => 158,
    'NG' => 159,
    'NI' => 160,
    'NL' => 161,
    'NO' => 162,
    'NP' => 163,
    'NR' => 164,
    'NU' => 165,
    'NZ' => 166,
    'OM' => 167,
    'PA' => 168,
    'PE' => 169,
    'PF' => 170,
    'PG' => 171,
    'PH' => 172,
    'PK' => 173,
    'PL' => 174,
    'PM' => 175,
    'PN' => 176,
    'PR' => 177,
    'PS' => 178,
    'PT' => 179,
    'PW' => 180,
    'PY' => 181,
    'QA' => 182,
    'RE' => 183,
    'RO' => 184,
    'RU' => 185,
    'RW' => 186,
    'SA' => 187,
    'SB' => 188,
    'SC' => 189,
    'SD' => 190,
    'SE' => 191,
    'SG' => 192,
    'SH' => 193,
    'SI' => 194,
    'SJ' => 195,
    'SK' => 196,
    'SL' => 197,
    'SM' => 198,
    'SN' => 199,
    'SO' => 200,
    'SR' => 201,
    'ST' => 202,
    'SV' => 203,
    'SY' => 204,
    'SZ' => 205,
    'TC' => 206,
    'TD' => 207,
    'TF' => 208,
    'TG' => 209,
    'TH' => 210,
    'TJ' => 211,
    'TK' => 212,
    'TM' => 213,
    'TN' => 214,
    'TO' => 215,
    'TP' => 216,
    'TR' => 217,
    'TT' => 218,
    'TV' => 219,
    'TW' => 220,
    'TZ' => 221,
    'UA' => 222,
    'UG' => 223,
    'UM' => 224,
    'US' => 225,
    'UY' => 226,
    'UZ' => 227,
    'VA' => 228,
    'VC' => 229,
    'VE' => 230,
    'VG' => 231,
    'VI' => 232,
    'VN' => 233,
    'VU' => 234,
    'WF' => 235,
    'WS' => 236,
    'YE' => 237,
    'YT' => 238,
    'YU' => 239,
    'ZA' => 240,
    'ZM' => 241,
    'ZR' => 242,
    'ZW' => 243,
    'A1' => 244,
    'A2' => 245,
    'O1' => 246,
];
$GEOIP_COUNTRY_CODES          = [
    '',
    'AP',
    'EU',
    'AD',
    'AE',
    'AF',
    'AG',
    'AI',
    'AL',
    'AM',
    'AN',
    'AO',
    'AQ',
    'AR',
    'AS',
    'AT',
    'AU',
    'AW',
    'AZ',
    'BA',
    'BB',
    'BD',
    'BE',
    'BF',
    'BG',
    'BH',
    'BI',
    'BJ',
    'BM',
    'BN',
    'BO',
    'BR',
    'BS',
    'BT',
    'BV',
    'BW',
    'BY',
    'BZ',
    'CA',
    'CC',
    'CD',
    'CF',
    'CG',
    'CH',
    'CI',
    'CK',
    'CL',
    'CM',
    'CN',
    'CO',
    'CR',
    'CU',
    'CV',
    'CX',
    'CY',
    'CZ',
    'DE',
    'DJ',
    'DK',
    'DM',
    'DO',
    'DZ',
    'EC',
    'EE',
    'EG',
    'EH',
    'ER',
    'ES',
    'ET',
    'FI',
    'FJ',
    'FK',
    'FM',
    'FO',
    'FR',
    'FX',
    'GA',
    'GB',
    'GD',
    'GE',
    'GF',
    'GH',
    'GI',
    'GL',
    'GM',
    'GN',
    'GP',
    'GQ',
    'GR',
    'GS',
    'GT',
    'GU',
    'GW',
    'GY',
    'HK',
    'HM',
    'HN',
    'HR',
    'HT',
    'HU',
    'ID',
    'IE',
    'IL',
    'IN',
    'IO',
    'IQ',
    'IR',
    'IS',
    'IT',
    'JM',
    'JO',
    'JP',
    'KE',
    'KG',
    'KH',
    'KI',
    'KM',
    'KN',
    'KP',
    'KR',
    'KW',
    'KY',
    'KZ',
    'LA',
    'LB',
    'LC',
    'LI',
    'LK',
    'LR',
    'LS',
    'LT',
    'LU',
    'LV',
    'LY',
    'MA',
    'MC',
    'MD',
    'MG',
    'MH',
    'MK',
    'ML',
    'MM',
    'MN',
    'MO',
    'MP',
    'MQ',
    'MR',
    'MS',
    'MT',
    'MU',
    'MV',
    'MW',
    'MX',
    'MY',
    'MZ',
    'NA',
    'NC',
    'NE',
    'NF',
    'NG',
    'NI',
    'NL',
    'NO',
    'NP',
    'NR',
    'NU',
    'NZ',
    'OM',
    'PA',
    'PE',
    'PF',
    'PG',
    'PH',
    'PK',
    'PL',
    'PM',
    'PN',
    'PR',
    'PS',
    'PT',
    'PW',
    'PY',
    'QA',
    'RE',
    'RO',
    'RU',
    'RW',
    'SA',
    'SB',
    'SC',
    'SD',
    'SE',
    'SG',
    'SH',
    'SI',
    'SJ',
    'SK',
    'SL',
    'SM',
    'SN',
    'SO',
    'SR',
    'ST',
    'SV',
    'SY',
    'SZ',
    'TC',
    'TD',
    'TF',
    'TG',
    'TH',
    'TJ',
    'TK',
    'TM',
    'TN',
    'TO',
    'TP',
    'TR',
    'TT',
    'TV',
    'TW',
    'TZ',
    'UA',
    'UG',
    'UM',
    'US',
    'UY',
    'UZ',
    'VA',
    'VC',
    'VE',
    'VG',
    'VI',
    'VN',
    'VU',
    'WF',
    'WS',
    'YE',
    'YT',
    'YU',
    'ZA',
    'ZM',
    'ZR',
    'ZW',
    'A1',
    'A2',
    'O1',
];

$GEOIP_COUNTRY_CODES3 = [
    '',
    'AP',
    'EU',
    'AND',
    'ARE',
    'AFG',
    'ATG',
    'AIA',
    'ALB',
    'ARM',
    'ANT',
    'AGO',
    'AQ',
    'ARG',
    'ASM',
    'AUT',
    'AUS',
    'ABW',
    'AZE',
    'BIH',
    'BRB',
    'BGD',
    'BEL',
    'BFA',
    'BGR',
    'BHR',
    'BDI',
    'BEN',
    'BMU',
    'BRN',
    'BOL',
    'BRA',
    'BHS',
    'BTN',
    'BV',
    'BWA',
    'BLR',
    'BLZ',
    'CAN',
    'CC',
    'COD',
    'CAF',
    'COG',
    'CHE',
    'CIV',
    'COK',
    'CHL',
    'CMR',
    'CHN',
    'COL',
    'CRI',
    'CUB',
    'CPV',
    'CX',
    'CYP',
    'CZE',
    'DEU',
    'DJI',
    'DNK',
    'DMA',
    'DOM',
    'DZA',
    'ECU',
    'EST',
    'EGY',
    'ESH',
    'ERI',
    'ESP',
    'ETH',
    'FIN',
    'FJI',
    'FLK',
    'FSM',
    'FRO',
    'FRA',
    'FX',
    'GAB',
    'GBR',
    'GRD',
    'GEO',
    'GUF',
    'GHA',
    'GIB',
    'GRL',
    'GMB',
    'GIN',
    'GLP',
    'GNQ',
    'GRC',
    'GS',
    'GTM',
    'GUM',
    'GNB',
    'GUY',
    'HKG',
    'HM',
    'HND',
    'HRV',
    'HTI',
    'HUN',
    'IDN',
    'IRL',
    'ISR',
    'IND',
    'IO',
    'IRQ',
    'IRN',
    'ISL',
    'ITA',
    'JAM',
    'JOR',
    'JPN',
    'KEN',
    'KGZ',
    'KHM',
    'KIR',
    'COM',
    'KNA',
    'PRK',
    'KOR',
    'KWT',
    'CYM',
    'KAZ',
    'LAO',
    'LBN',
    'LCA',
    'LIE',
    'LKA',
    'LBR',
    'LSO',
    'LTU',
    'LUX',
    'LVA',
    'LBY',
    'MAR',
    'MCO',
    'MDA',
    'MDG',
    'MHL',
    'MKD',
    'MLI',
    'MMR',
    'MNG',
    'MAC',
    'MNP',
    'MTQ',
    'MRT',
    'MSR',
    'MLT',
    'MUS',
    'MDV',
    'MWI',
    'MEX',
    'MYS',
    'MOZ',
    'NAM',
    'NCL',
    'NER',
    'NFK',
    'NGA',
    'NIC',
    'NLD',
    'NOR',
    'NPL',
    'NRU',
    'NIU',
    'NZL',
    'OMN',
    'PAN',
    'PER',
    'PYF',
    'PNG',
    'PHL',
    'PAK',
    'POL',
    'SPM',
    'PCN',
    'PRI',
    'PSE',
    'PRT',
    'PLW',
    'PRY',
    'QAT',
    'REU',
    'ROU',
    'RUS',
    'RWA',
    'SAU',
    'SLB',
    'SYC',
    'SDN',
    'SWE',
    'SGP',
    'SHN',
    'SVN',
    'SJM',
    'SVK',
    'SLE',
    'SMR',
    'SEN',
    'SOM',
    'SUR',
    'STP',
    'SLV',
    'SYR',
    'SWZ',
    'TCA',
    'TCD',
    'TF',
    'TGO',
    'THA',
    'TJK',
    'TKL',
    'TLS',
    'TKM',
    'TUN',
    'TON',
    'TUR',
    'TTO',
    'TUV',
    'TWN',
    'TZA',
    'UKR',
    'UGA',
    'UM',
    'USA',
    'URY',
    'UZB',
    'VAT',
    'VCT',
    'VEN',
    'VGB',
    'VIR',
    'VNM',
    'VUT',
    'WLF',
    'WSM',
    'YEM',
    'YT',
    'YUG',
    'ZAF',
    'ZMB',
    'ZR',
    'ZWE',
    'A1',
    'A2',
    'O1',
];

$GEOIP_COUNTRY_NAMES = [
    '',
    'Asia/Región Pacífica',
    'Europa',
    'Andorra',
    'Emiratos Árabes Unidos',
    'Afganistán',
    'Antigua y Barbuda',
    'Anguila',
    'Albania',
    'Armenia',
    'Antillas holandesas',
    'Angola',
    'Antártida',
    'Argentina',
    'Samoa Americano',
    'Austria',
    'Australia',
    'Aruba',
    'Azerbaiján',
    'Bosnia Herzegovina',
    'Barbados',
    'Bangla Desh',
    'Bélgica',
    'Burkina Faso',
    'Bulgaria',
    'Bahrein',
    'Burundi',
    'Benin',
    'Bermudas',
    'Brunei Darussalam',
    'Bolivia',
    'Brasil',
    'Bahamas',
    'Bhután',
    'Isla de Bouvet',
    'Botswana',
    'Bielorrusia',
    'Belice',
    'Canadá',
    'Islas cocos',
    'Congo, República democrática del',
    'República Centroafricana',
    'Congo',
    'Suiza',
    'Costa de Ivório',
    'Islas Cook',
    'Chile',
    'Camerún',
    'China',
    'Colombia',
    'Costa Rica',
    'Cuba',
    'Cabo Verde',
    'Isla de Navidad',
    'Cipria',
    'Republica Checa',
    'Alemania',
    'Djabuti',
    'Dinamarca',
    'Dominica',
    'Republica Dominicana',
    'Argelia',
    'Ecuador',
    'Estonia',
    'Egipto',
    'Sahara Occidental',
    'Eritrea',
    'España',
    'Etiopía',
    'Finlandia',
    'Fiji',
    'Islas Malvinas',
    'Estados Federados de la Micronesia',
    'Islas de Faroe',
    'Francia',
    'Francia, Metropolitana',
    'Gabón',
    'Reino Unido',
    'Granada',
    'Georgia',
    'Guayana Francesa',
    'Ghana',
    'Gibraltar',
    'Groenlandia',
    'Gambia',
    'Guinea',
    'Guadalupe',
    'Guinea Ecuatorial',
    'Grecia',
    'Georgia Sur e Islas Sándwich del Sur',
    'Guatemala',
    'Guam',
    'Guinea-Bissau',
    'Guyana',
    'Hong Kong',
    'Islas Heard y McDonald',
    'Honduras',
    'Croacia',
    'Haití',
    'Hungría',
    'Indonesia',
    'Irlanda',
    'Israel',
    'India',
    'Territorio Británico del Océano Índico',
    'Iraq',
    'República Islámica de Irán',
    'Islandia',
    'Italia',
    'Jamaica',
    'Jordán',
    'Japón',
    'Kenya',
    'Kyrgyzstán',
    'Camboya',
    'Kiribati',
    'Comores',
    'San Kitts y Nevis',
    'Corea, República Democrática del Pueblo de',
    'Corea, República de',
    'Kuwait',
    'Islas Caimán',
    'Kazajstán',
    'República Democrática del Pueblo de Lao',
    'El Líbano',
    'Santa Lucía',
    'Liechtenstein',
    'Sri Lanka',
    'Liberia',
    'Lesotho',
    'Lituania',
    'Luxemburgo',
    'Latvia',
    'Jamahiriya Árabe Libio',
    'Marruecos',
    'Mónaco',
    'República de Moldavia',
    'Madagascar',
    'Islas Marshall',
    'Macedonia',
    'Malí',
    'Myanmar',
    'Mongolia',
    'Macao',
    'Islas de Mariana Norteñas',
    'Martinica',
    'Mauritania',
    'Montserrat',
    'Malta',
    'Mauricio',
    'Maldivas',
    'Malawi',
    'México',
    'Malasia',
    'Mozambique',
    'Namibia',
    'Nueva Caledonia',
    'Níger',
    'Isla Norfolk',
    'Nigeria',
    'Nicaragua',
    'Holanda',
    'Noruega',
    'Nepal',
    'Nauru',
    'Niue',
    'Nueva Zelanda',
    'Omán',
    'Panamá',
    'Perú',
    'Polinesia Francesa',
    'Papúa Nueva Guinea',
    'Filipinas',
    'Pakistán',
    'Polonia',
    'Pedro y Miquelón',
    'Islas Pitcairn',
    'Puerto Rico',
    'Territorio Palestino Ocupado',
    'Portugal',
    'Palau',
    'Paraguay',
    'Qatar',
    'Reunión',
    'Rumania',
    'Federación Rusa',
    'Ruanda',
    'Arabia Saudita',
    'Islas Salomón',
    'Seychelles',
    'Sudán',
    'Suecia',
    'Singapur',
    'Santa Helena',
    'Eslovenia',
    'Islas Svalbard y Jan Mayen',
    'Eslovaquia',
    'Sierra Leone',
    'San Marino',
    'Senegal',
    'Somalia',
    'Surinam',
    'Sao Tome y Príncipe',
    'El Salvador',
    'República Árabe Siria',
    'Swazilandia',
    'Islas Turcas y Caicos',
    'Chad',
    'Territorios Sureños Franceses',
    'Togo',
    'Tailandia',
    'Tayikistán',
    'Tokelau',
    'Turkmenistán',
    'Túnez',
    'Tonga',
    'Timor Oriental',
    'Turquía',
    'Trinidad y Tobago',
    'Tuvalu',
    'Taiwán',
    'Taiwán, Provincia de China',
    'Ucrania',
    'Uganda',
    'Islas Remotas Menores de Estados Unidos',
    'Estados Unidos',
    'Uruguay',
    'Uzbekistán',
    'Estado de la Ciudad del Vaticano',
    'San Vicente y los Granadinos',
    'Venezuela',
    'Islas Vírgenes Británicas',
    'Islas Vírgenes Americanas',
    'Vietnam',
    'Vanuatu',
    'Islas Wallis y Futuna',
    'Samoa',
    'República del Yemen',
    'Mayotte',
    'Yugoslavia',
    'Sudáfrica',
    'Zambia',
    'Zaire',
    'Zimbabwe',
    'Proxy Anónimo',
    'Proveedor de Satélite',
    'Otro',
];

define('GEOIP_COUNTRY_BEGIN', 16776960);
define('GEOIP_STATE_BEGIN_REV0', 16700000);
define('GEOIP_STATE_BEGIN_REV1', 16000000);
define('GEOIP_STANDARD', 0);
define('GEOIP_MEMORY_CACHE', 1);
define('GEOIP_SHARED_MEMORY', 2);
define('STRUCTURE_INFO_MAX_SIZE', 20);
define('DATABASE_INFO_MAX_SIZE', 100);
define('GEOIP_COUNTRY_EDITION', 106);
define('GEOIP_PROXY_EDITION', 8);
define('GEOIP_ASNUM_EDITION', 9);
define('GEOIP_NETSPEED_EDITION', 10);
define('GEOIP_REGION_EDITION_REV0', 112);
define('GEOIP_REGION_EDITION_REV1', 3);
define('GEOIP_CITY_EDITION_REV0', 111);
define('GEOIP_CITY_EDITION_REV1', 2);
define('GEOIP_ORG_EDITION', 110);
define('SEGMENT_RECORD_LENGTH', 3);
define('STANDARD_RECORD_LENGTH', 3);
define('ORG_RECORD_LENGTH', 4);
define('MAX_RECORD_LENGTH', 4);
define('MAX_ORG_RECORD_LENGTH', 300);
define('GEOIP_SHM_KEY', 0x4f415401);
define('US_OFFSET', 1);
define('CANADA_OFFSET', 677);
define('WORLD_OFFSET', 1353);
define('FIPS_RANGE', 360);
define('GEOIP_UNKNOWN_SPEED', 0);
define('GEOIP_DIALUP_SPEED', 1);
define('GEOIP_CABLEDSL_SPEED', 2);
define('GEOIP_CORPORATE_SPEED', 3);

class GeoIP
{
    public $flags;
    public $filehandle;
    public $memory_buffer;
    public $databaseType;
    public $databaseSegments;
    public $record_length;
    public $shmid;
}

function geoip_load_shared_mem($file)
{
    $fp = fopen($file, 'rb');
    if (!$fp) {
        print "error opening $file: $php_errormsg\n";
        exit;
    }
    $s_array = fstat($fp);
    $size    = $s_array['size'];

    if ($shmid = shmop_open(GEOIP_SHM_KEY, 'w', 0, 0)) {
        shmop_delete($shmid);
        shmop_close($shmid);
    }
    $shmid = shmop_open(GEOIP_SHM_KEY, 'c', 0644, $size);
    shmop_write($shmid, fread($fp, $size), 0);
    shmop_close($shmid);
}

function _setup_segments($gi)
{
    $gi->databaseType  = GEOIP_COUNTRY_EDITION;
    $gi->record_length = STANDARD_RECORD_LENGTH;

    if ($gi->flags & GEOIP_SHARED_MEMORY) {
        $offset = shmop_size($gi->shmid) - 3;
        for ($i = 0; $i < STRUCTURE_INFO_MAX_SIZE; $i++) {
            $delim  = shmop_read($gi->shmid, $offset, 3);
            $offset += 3;
            if ($delim == (chr(255) . chr(255) . chr(255))) {
                $gi->databaseType = ord(shmop_read($gi->shmid, $offset, 1));
                $offset++;

                if (GEOIP_REGION_EDITION_REV0 == $gi->databaseType) {
                    $gi->databaseSegments = GEOIP_STATE_BEGIN_REV0;
                } elseif (GEOIP_REGION_EDITION_REV1 == $gi->databaseType) {
                    $gi->databaseSegments = GEOIP_STATE_BEGIN_REV1;
                } elseif ((GEOIP_CITY_EDITION_REV0 == $gi->databaseType)
                          || (GEOIP_CITY_EDITION_REV1 == $gi->databaseType)
                          || (GEOIP_ORG_EDITION == $gi->databaseType)
                          || (GEOIP_ISP_EDITION == $gi->databaseType)
                          || (GEOIP_ASNUM_EDITION == $gi->databaseType)) {
                    $gi->databaseSegments = 0;
                    $buf                  = shmop_read($gi->shmid, $offset, SEGMENT_RECORD_LENGTH);
                    for ($j = 0; $j < SEGMENT_RECORD_LENGTH; $j++) {
                        $gi->databaseSegments += (ord($buf[$j]) << ($j * 8));
                    }
                    if ((GEOIP_ORG_EDITION == $gi->databaseType)
                        || (GEOIP_ISP_EDITION == $gi->databaseType)) {
                        $gi->record_length = ORG_RECORD_LENGTH;
                    }
                }
                break;
            }

            $offset -= 4;
        }
        if ((GEOIP_COUNTRY_EDITION == $gi->databaseType) | (GEOIP_PROXY_EDITION == $gi->databaseType) | (GEOIP_NETSPEED_EDITION == $gi->databaseType)) {
            $gi->databaseSegments = GEOIP_COUNTRY_BEGIN;
        }
    } else {
        $filepos = ftell($gi->filehandle);
        fseek($gi->filehandle, -3, SEEK_END);
        for ($i = 0; $i < STRUCTURE_INFO_MAX_SIZE; $i++) {
            $delim = fread($gi->filehandle, 3);
            if ($delim == (chr(255) . chr(255) . chr(255))) {
                $gi->databaseType = ord(fread($gi->filehandle, 1));
                if (GEOIP_REGION_EDITION_REV0 == $gi->databaseType) {
                    $gi->databaseSegments = GEOIP_STATE_BEGIN_REV0;
                } elseif (GEOIP_REGION_EDITION_REV1 == $gi->databaseType) {
                    $gi->databaseSegments = GEOIP_STATE_BEGIN_REV1;
                } elseif ((GEOIP_CITY_EDITION_REV0 == $gi->databaseType)
                          || (GEOIP_CITY_EDITION_REV1 == $gi->databaseType)
                          || (GEOIP_ORG_EDITION == $gi->databaseType)
                          || (GEOIP_ISP_EDITION == $gi->databaseType)
                          || (GEOIP_ASNUM_EDITION == $gi->databaseType)) {
                    $gi->databaseSegments = 0;
                    $buf                  = fread($gi->filehandle, SEGMENT_RECORD_LENGTH);
                    for ($j = 0; $j < SEGMENT_RECORD_LENGTH; $j++) {
                        $gi->databaseSegments += (ord($buf[$j]) << ($j * 8));
                    }
                    if (GEOIP_ORG_EDITION == $gi->databaseType) {
                        $gi->record_length = ORG_RECORD_LENGTH;
                    }
                }
                break;
            }

            fseek($gi->filehandle, -4, SEEK_CUR);
        }
        if ((GEOIP_COUNTRY_EDITION == $gi->databaseType) | (GEOIP_PROXY_EDITION == $gi->databaseType) | (GEOIP_NETSPEED_EDITION == $gi->databaseType)) {
            $gi->databaseSegments = GEOIP_COUNTRY_BEGIN;
        }
        fseek($gi->filehandle, $filepos, SEEK_SET);
    }
    return $gi;
}

function geoip_open($filename, $flags)
{
    $gi        = new GeoIP();
    $gi->flags = $flags;

    if ($gi->flags & GEOIP_SHARED_MEMORY) {
        $gi->shmid = shmop_open(GEOIP_SHM_KEY, 'a', 0, 0);
    } else {
        $gi->filehandle = fopen($filename, 'rb');

        if ($gi->flags & GEOIP_MEMORY_CACHE) {
            $s_array           = fstat($gi->filehandle);
            $gi->memory_buffer = fread($gi->filehandle, $s_array[size]);
        }
    }

    $gi = _setup_segments($gi);
    return $gi;
}

function geoip_close($gi)
{
    return fclose($gi->filehandle);
}

function geoip_country_id_by_name($gi, $name)
{
    $addr = gethostbyname($name);
    if (!$addr || $addr == $name) {
        return false;
    }
    return geoip_country_id_by_addr($gi, $addr);
}

function geoip_country_code_by_name($gi, $name)
{
    $country_id = geoip_country_id_by_name($gi, $name);
    if (false !== $country_id) {
        return $GLOBALS['GEOIP_COUNTRY_CODES'][$country_id];
    }
    return false;
}

function geoip_country_name_by_name($gi, $name)
{
    $country_id = geoip_country_id_by_name($gi, $name);
    if (false !== $country_id) {
        return $GLOBALS['GEOIP_COUNTRY_NAMES'][$country_id];
    }
    return false;
}

function geoip_country_id_by_addr($gi, $addr)
{
    $ipnum = ip2long($addr);
    return _geoip_seek_country($gi, $ipnum) - GEOIP_COUNTRY_BEGIN;
}

function geoip_country_code_by_addr($gi, $addr)
{
    $country_id = geoip_country_id_by_addr($gi, $addr);
    if (false !== $country_id) {
        return $GLOBALS['GEOIP_COUNTRY_CODES'][$country_id];
    }
    return false;
}

function geoip_country_name_by_addr($gi, $addr)
{
    $country_id = geoip_country_id_by_addr($gi, $addr);
    if (false !== $country_id) {
        return $GLOBALS['GEOIP_COUNTRY_NAMES'][$country_id];
    }
    return false;
}

function _geoip_seek_country($gi, $ipnum)
{
    $offset = 0;
    for ($depth = 31; $depth >= 0; --$depth) {
        if ($gi->flags & GEOIP_MEMORY_CACHE) {
            $buf = substr(
                $gi->memory_buffer,
                2 * $gi->record_length * $offset,
                2 * $gi->record_length
            );
        } elseif ($gi->flags & GEOIP_SHARED_MEMORY) {
            $buf = shmop_read(
                $gi->shmid,
                2 * $gi->record_length * $offset,
                2 * $gi->record_length
            );
        } else {
            0 == fseek($gi->filehandle, 2 * $gi->record_length * $offset, SEEK_SET) or die('fseek failed');
            $buf = fread($gi->filehandle, 2 * $gi->record_length);
        }
        $x = [0, 0];
        for ($i = 0; $i < 2; ++$i) {
            for ($j = 0; $j < $gi->record_length; ++$j) {
                $x[$i] += ord($buf[$gi->record_length * $i + $j]) << ($j * 8);
            }
        }
        if ($ipnum & (1 << $depth)) {
            if ($x[1] >= $gi->databaseSegments) {
                return $x[1];
            }
            $offset = $x[1];
        } else {
            if ($x[0] >= $gi->databaseSegments) {
                return $x[0];
            }
            $offset = $x[0];
        }
    }

    trigger_error('error traversing database - perhaps it is corrupt?', E_USER_ERROR);
    return false;
}

function _get_org($gi, $ipnum)
{
    $seek_org = _geoip_seek_country($gi, $ipnum);
    if ($seek_org == $gi->databaseSegments) {
        return null;
    }
    $record_pointer = $seek_org + (2 * $gi->record_length - 1) * $gi->databaseSegments;
    if ($gi->flags & GEOIP_SHARED_MEMORY) {
        $org_buf = shmop_read($gi->shmid, $record_pointer, MAX_ORG_RECORD_LENGTH);
    } else {
        fseek($gi->filehandle, $record_pointer, SEEK_SET);
        $org_buf = fread($gi->filehandle, MAX_ORG_RECORD_LENGTH);
    }
    $org_buf = substr($org_buf, 0, strpos($org_buf, 0));
    return $org_buf;
}

function geoip_org_by_addr($gi, $addr)
{
    if (null === $addr) {
        return 0;
    }
    $ipnum = ip2long($addr);
    return _get_org($gi, $ipnum);
}

function _get_region($gi, $ipnum)
{
    if (GEOIP_REGION_EDITION_REV0 == $gi->databaseType) {
        $seek_region = _geoip_seek_country($gi, $ipnum) - GEOIP_STATE_BEGIN_REV0;
        if ($seek_region >= 1000) {
            $country_code = 'US';
            $region       = chr(($seek_region - 1000) / 26 + 65) . chr(($seek_region - 1000) % 26 + 65);
        } else {
            $country_code = $GLOBALS['GEOIP_COUNTRY_CODES'][$seek_region];
            $region       = '';
        }
        return [$country_code, $region];
    }

    if (GEOIP_REGION_EDITION_REV1 == $gi->databaseType) {
        $seek_region = _geoip_seek_country($gi, $ipnum) - GEOIP_STATE_BEGIN_REV1;
        //print $seek_region;
        if ($seek_region < US_OFFSET) {
            $country_code = '';
            $region       = '';
        } elseif ($seek_region < CANADA_OFFSET) {
            $country_code = 'US';
            $region       = chr(($seek_region - US_OFFSET) / 26 + 65) . chr(($seek_region - US_OFFSET) % 26 + 65);
        } elseif ($seek_region < WORLD_OFFSET) {
            $country_code = 'CA';
            $region       = chr(($seek_region - CANADA_OFFSET) / 26 + 65) . chr(($seek_region - CANADA_OFFSET) % 26 + 65);
        } else {
            $country_code = $GLOBALS['GEOIP_COUNTRY_CODES'][($seek_region - WORLD_OFFSET) / FIPS_RANGE];
            $region       = '';
        }
        return [$country_code, $region];
    }
}

function geoip_region_by_addr($gi, $addr)
{
    if (null === $addr) {
        return 0;
    }
    $ipnum = ip2long($addr);
    return _get_region($gi, $ipnum);
}

function getdnsattributes($l, $ip)
{
    $r              = new Net_DNS_Resolver();
    $r->nameservers = ['ws1.maxmind.com'];
    $p              = $r->search($l . '.' . $ip . '.s.maxmind.com', 'TXT', 'IN');
    $str            = is_object($p->answer[0]) ? $p->answer[0]->string() : '';
    preg_match('/"(.*)"/', $str, $regs);
    $str = $regs[1];
    return $str;
}

