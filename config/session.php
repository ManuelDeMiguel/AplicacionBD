ados', 'Belarus', 'Belgium', 'Belize', 'Benin', 'Bermuda', 'Bhutan', 'Bolivia', 'Bosnia and Herzegovina', 'Botswana', 'Bouvet Island (Bouvetoya)', 'Brazil', 'British Indian Ocean Territory (Chagos Archipelago)', 'British Virgin Islands', 'Brunei Darussalam', 'Bulgaria', 'Burkina Faso', 'Burundi',
        'Cambodia', 'Cameroon', 'Canada', 'Cape Verde', 'Cayman Islands', 'Central African Republic', 'Chad', 'Chile', 'China', 'Christmas Island', 'Cocos (Keeling) Islands', 'Colombia', 'Comoros', 'Congo', 'Cook Islands', 'Costa Rica', 'Cote d\'Ivoire', 'Croatia', 'Cuba', 'Cyprus', 'Czech Republic',
        'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic',
        'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Ethiopia',
        'Faroe Islands', 'Falkland Islands (Malvinas)', 'Fiji', 'Finland', 'France', 'French Guiana', 'French Polynesia', 'French Southern Territories',
        'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Gibraltar', 'Greece', 'Greenland', 'Grenada', 'Guadeloupe', 'Guam', 'Guatemala', 'Guernsey', 'Guinea', 'Guinea-Bissau', 'Guyana',
        'Haiti', 'Heard Island and McDonald Islands', 'Holy See (Vatican City State)', 'Honduras', 'Hong Kong', 'Hungary',
        'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland', 'Isle of Man', 'Israel', 'Italy',
        'Jamaica', 'Japan', 'Jersey', 'Jordan',
        'Kazakhstan', 'Kenya', 'Kiribati', 'Korea', 'Korea', 'Kuwait', 'Kyrgyz Republic',
        'Lao People\'s Democratic Republic', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libyan Arab Jamahiriya', 'Liechtenstein', 'Lithuania', 'Luxembourg',
        'Macao', 'Macedonia', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta', 'Marshall Islands', 'Martinique', 'Mauritania', 'Mauritius', 'Mayotte', 'Mexico', 'Micronesia', 'Moldova', 'Monaco', 'Mongolia', 'Montenegro', 'Montserrat', 'Morocco', 'Mozambique', 'Myanmar',
        'Namibia', 'Nauru', 'Nepal', 'Netherlands Antilles', 'Netherlands', 'New Caledonia', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'Niue', 'Norfolk Island', 'Northern Mariana Islands', 'Norway',
        'Oman',
        'Pakistan', 'Palau', 'Palestinian Territories', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Pitcairn Islands', 'Poland', 'Portugal', 'Puerto Rico',
        'Qatar',
        'Reunion', 'Romania', 'Russian Federation', 'Rwanda',
        'Saint Barthelemy', 'Saint Helena', 'Saint Kitts and Nevis', 'Saint Lucia', 'Saint Martin', 'Saint Pierre and Miquelon', 'Saint Vincent and the Grenadines', 'Samoa', 'San Marino', 'Sao Tome and Principe', 'Saudi Arabia', 'Senegal', 'Serbia', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovakia (Slovak Republic)', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Georgia and the South Sandwich Islands', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname', 'Svalbard & Jan Mayen Islands', 'Swaziland', 'Sweden', 'Switzerland', 'Syrian Arab Republic',
        'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand', 'Timor-Leste', 'Togo', 'Tokelau', 'Tonga', 'Trinidad and Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Turks and Caicos Islands', 'Tuvalu',
        'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'United States of America', 'United States Minor Outlying Islands', 'United States Virgin Islands', 'Uruguay', 'Uzbekistan',
        'Vanuatu', 'Venezuela', 'Vietnam',
        'Wallis and Futuna', 'Western Sahara',
        'Yemen',
        'Zambia', 'Zimbabwe',
    ];

    public function hamletName()
    {
        $format = static::randomElement(static::$hamletNameFormats);

        return static::bothify($this->generator->parse($format));
    }

    public function hamletPrefix()
    {
        return static::randomElement(static::$hamletPrefix);
    }

    public function wardName()
    {
        $format = static::randomElement(static::$wardNameFormats);

        return static::bothify($this->generator->parse($format));
    }

    public function wardPrefix()
    {
        return static::randomElement(static::$wardPrefix);
    }

    public function distri<?php

namespace Faker\Provider\lv_LV;

use Faker\Calculator\Luhn;
use Faker\Provider\DateTime;

class Person extends \Faker\Provider\Person
{
    /**
     * {@link} http://vardunozime.lv/names-male
     */
    protected static $firstNameMale = [
        'Acons', 'Adalberts', 'Adelions', 'Adeljans', 'Adeļjons', 'Adgars', 'Adis', 'Ado', 'Adonis', 'Adoniss', 'Adrians', 'Adriāns', 'Adris', 'Afanasijs', 'Agatons', 'Agejs', 'Agijs', 'Aģis', 'Agnārs', 'Agnis', 'Agris', 'Agrits', 'Agrons', 'Agurs', 'Ahmads', 'Ahmeds', 'Ahto', 'Aidars', 'Aidis', 'Aigars', 'Aigijs', 'Aigils', 'Aigis', 'Aigo', 'Aigvars', 'Ailands', 'Aimo', 'Ainards', 'Ainārs', 'Ainars', 'Ainis', 'Aino', 'Airats', 'Airiks', 'Airis', 'Airtons', 'Aivalds', 'Aivars', 'Aivārs', 'Aivijs', 'Aivils', 'Aivis', 'Aivo', 'Akims', 'Ako', 'Akselis', 'Aksels', 'Alans', 'Alberts', 'Albīns', 'Albins', 'Aldijs', 'Aldis', 'Aldonis', 'Aldons', 'Aldris', 'Aleksandris', 'Aleksandrs', 'Aleksejs', 'Aleksis', 'Alekss', 'Alens', 'Alēns', 'Alereins', 'Alesandrs', 'Alfejs', 'Alfijs', 'Alfins', 'Alfons', 'Alfonss', 'Alfrēds', 'Alfreds', 'Alfrīds', 'Alfrids', 'Alfs', 'Algarts', 'Algers', 'Alģerts', 'Alģimants', 'Aļģirds', 'Algirds', 'Alģirds', 'Aļģirts', 'Alģirts', 'Alģis', 'Aļģis', 'Aliks', 'Aļiks', 'Alis', 'Alisters', 'Allans', 'Allens', 'Almands', 'Almants', 'Almārs', 'Almonds', 'Alnars', 'Alnis', 'Alnors', 'Aloīzijs', 'Aloizis', 'Aloizs', 'Aloīzs', 'Alons', 'Alsis', 'Altairs', 'Alvaro', 'Alvars', 'Alvids', 'Alvijs', 'Alvils', 'Alvīns', 'Alvis', 'Alvits', 'Amandis', 'Amands', 'Ambrozijs', 'Amijs', 'Amirans', 'Amirs', 'Amunds', 'Anārs', 'Anastāsijs', 'Anastāzijs', 'Anatolijs', 'Anatols', 'Ancis', 'Andars', 'Andejs', 'Anders', 'Anderss', 'Andijs', 'Andis', 'Ando', 'Andreass', 'Andrejans', 'Andrejs', 'Andrējs', 'Andress', 'Andriāns', 'Andrievs', 'Andrijans', 'Andrijs', 'Andris', 'Androns', 'Andrs', 'Andrus', 'Andruss', 'Andulis', 'Andžejs', 'Andzelms', 'Andželo', 'Andžs', 'Anfims', 'Angarijs', 'Anicets', 'Anis', 'Anrī', 'Anrijs', 'Anris', 'Anriss', 'Anselms', 'Ansis', 'Anšlavs', 'Antans', 'Antars', 'Antis', 'Antonijs', 'Antonio', 'Antons', 'Antris', 'Ants', 'Antuans', 'Anufrijs', 'Anvars', 'Anzelms', 'Anžijs', 'Apolinārijs', 'Apolinārs', 'Apolons', 'Aralds', 'Arams', 'Arčijs', 'Arčils', 'Ardis', 'Ards', 'Aress', 'Aretijs', 'Arets', 'Argils', 'Argo', 'Argods', 'Argons', 'Argots', 'Arguts', 'Arialds', 'Arians', 'Ariels', 'Arigo', 'Arijs', 'Ariko', 'Arilds', 'Arimands', 'Arīns', 'Arions', 'Aris', 'Ariss', 'Aristīds', 'Aristons', 'Arkādijs', 'Arlijs', 'Armando', 'Armands', 'Armanis', 'Armans', 'Armants', 'Armass', 'Armens', 'Armīds', 'Armīns', 'Armins', 'Armis', 'Arnis', 'Arno', 'Arnolds', 'Arnotijs', 'Arnulfs', 'Arsenijs', 'Arsēnijs', 'Arsens', 'Arsēns', 'Arsentijs', 'Artemijs', 'Artēmijs', 'Artijs', 'Artiks', 'Artis', 'Artjoms', 'Arts', 'Artūrs', 'Arturs', 'Arvalds', 'Arveds', 'Arvēds', 'Arvīds', '