<?php

use yii\db\Migration;

class m160426_211254_create_client_nationality extends Migration
{
    public function up()
    {
        $this->createTable('client_nationality', [
            'id' => $this->primaryKey(),
            'nationality_id' => $this->integer(6)->unsigned()->notNull(),
            'nationality' => $this->string(65)->notNull(),
            'is_active' => $this->int(1)->notNull()
        ]);

        // Insert data
        $this->insert('client_nationality', [
            'nationality_id' => 1,
            'nationality' => 'AFGHANISTAN'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 2,
            'nationality' => 'ALBANIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 3,
            'nationality' => 'ALGERIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 4,
            'nationality' => 'ANDORRA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 5,
            'nationality' => 'ANGOLA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 6,
            'nationality' => 'ANGUILLA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 7,
            'nationality' => 'ANTIGUA & BARBUDA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 8,
            'nationality' => 'ARGENTINA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 9,
            'nationality' => 'ARMENIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 10,
            'nationality' => 'ARUBA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 11,
            'nationality' => 'AUSTRALIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 12,
            'nationality' => 'AUSTRIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 13,
            'nationality' => 'AZERBAIJAN'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 14,
            'nationality' => 'BAHAMAS'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 15,
            'nationality' => 'BAHRAIN'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 16,
            'nationality' => 'BANGLADESH'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 17,
            'nationality' => 'BARBADOS'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 18,
            'nationality' => 'BELARUS'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 19,
            'nationality' => 'BELGIUM'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 20,
            'nationality' => 'BELIZE'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 21,
            'nationality' => 'BENIN'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 22,
            'nationality' => 'BERMUDA ISLANDS'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 23,
            'nationality' => 'BHUTAN'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 24,
            'nationality' => 'BOLIVIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 25,
            'nationality' => 'BOSNIA-HERCEGOVINA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 26,
            'nationality' => 'BOTSWANA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 27,
            'nationality' => 'BRAZIL'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 28,
            'nationality' => 'BRUNEI'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 29,
            'nationality' => 'BULGARIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 30,
            'nationality' => 'BURKINA FASO'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 31,
            'nationality' => 'BURUNDI'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 32,
            'nationality' => 'CAMBODIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 33,
            'nationality' => 'CAMEROON'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 34,
            'nationality' => 'CANADA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 35,
            'nationality' => 'CAPE VERDE'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 36,
            'nationality' => 'CAYMAN ISLANDS'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 37,
            'nationality' => 'CENTRAL AFRICAN REP.'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 38,
            'nationality' => 'CHAD'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 39,
            'nationality' => 'CHILE'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 40,
            'nationality' => 'CHINA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 41,
            'nationality' => 'COLOMBIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 42,
            'nationality' => 'COMOROS'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 43,
            'nationality' => 'CONGO, DEM. REP.'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 44,
            'nationality' => 'CONGO, REP.'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 45,
            'nationality' => 'COSTA RICA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 46,
            'nationality' => 'CROATIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 47,
            'nationality' => 'CUBA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 48,
            'nationality' => 'CYPRUS'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 49,
            'nationality' => 'CZECH REPUBLIC'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 50,
            'nationality' => 'DENMARK'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 51,
            'nationality' => 'DJIBOUTI'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 52,
            'nationality' => 'DOMINICA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 53,
            'nationality' => 'DOMINICAN REPUBLIC'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 54,
            'nationality' => 'EAST TIMOR'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 55,
            'nationality' => 'ECUADOR'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 56,
            'nationality' => 'EGYPT'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 57,
            'nationality' => 'EL SALVADOR'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 58,
            'nationality' => 'EQUATORIAL GUINEA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 59,
            'nationality' => 'ERITREA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 60,
            'nationality' => 'ESTONIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 61,
            'nationality' => 'ETHIOPIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 62,
            'nationality' => 'FEDERATED STATES OF MICRONESIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 63,
            'nationality' => 'FEDERATION OF SAINT KITTS,CHRISTOPHER AND NEVIS'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 64,
            'nationality' => 'FIJI'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 65,
            'nationality' => 'FINLAND'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 66,
            'nationality' => 'FRANCE'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 67,
            'nationality' => 'GABON'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 68,
            'nationality' => 'GAMBIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 69,
            'nationality' => 'GEORGIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 70,
            'nationality' => 'GERMANY'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 71,
            'nationality' => 'GHANA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 72,
            'nationality' => 'GREECE'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 73,
            'nationality' => 'GRENADA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 74,
            'nationality' => 'GRENADINES'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 75,
            'nationality' => 'GUATEMALA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 76,
            'nationality' => 'GUINEA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 77,
            'nationality' => 'GUINEA-BISSAU'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 78,
            'nationality' => 'GUYANA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 79,
            'nationality' => 'HAITI'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 80,
            'nationality' => 'HONDURAS'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 81,
            'nationality' => 'HONGKONG AND MACAO'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 82,
            'nationality' => 'HUNGARY'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 83,
            'nationality' => 'ICELAND'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 84,
            'nationality' => 'INDIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 85,
            'nationality' => 'INDONESIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 86,
            'nationality' => 'IRAN'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 87,
            'nationality' => 'IRAQ'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 88,
            'nationality' => 'IRELAND'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 89,
            'nationality' => 'ISRAEL'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 90,
            'nationality' => 'ITALY'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 91,
            'nationality' => 'IVORY COAST'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 92,
            'nationality' => 'JAMAICA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 93,
            'nationality' => 'JAPAN'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 94,
            'nationality' => 'JORDAN'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 95,
            'nationality' => 'KAZAKSTAN'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 96,
            'nationality' => 'KENYA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 97,
            'nationality' => 'KIRIBATI'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 98,
            'nationality' => 'KOREA (NORTH-)'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 99,
            'nationality' => 'KUWAIT'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 100,
            'nationality' => 'KYRGYSTAN'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 101,
            'nationality' => 'LAOS'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 102,
            'nationality' => 'LATVIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 103,
            'nationality' => 'LEBANON'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 104,
            'nationality' => 'LESOTHO'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 105,
            'nationality' => 'LIBERIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 106,
            'nationality' => 'LIBYA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 107,
            'nationality' => 'LIECHTENSTEIN'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 108,
            'nationality' => 'LITHUANIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 109,
            'nationality' => 'LUXEMBOURG'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 110,
            'nationality' => 'MACAU'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 111,
            'nationality' => 'MACEDONIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 112,
            'nationality' => 'MADAGASCAR'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 113,
            'nationality' => 'MALAWI'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 114,
            'nationality' => 'MALAYSIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 115,
            'nationality' => 'MALDIVES'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 116,
            'nationality' => 'MALI'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 117,
            'nationality' => 'MALTA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 118,
            'nationality' => 'MARSHALL ISLANDS'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 119,
            'nationality' => 'MAURITANIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 120,
            'nationality' => 'MAURITIUS'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 121,
            'nationality' => 'MEXICO'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 122,
            'nationality' => 'MICRONESIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 123,
            'nationality' => 'MOLDAVIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 124,
            'nationality' => 'MOLDOVA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 125,
            'nationality' => 'MONACO'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 126,
            'nationality' => 'MONGOLIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 127,
            'nationality' => 'MONTENEGRO'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 128,
            'nationality' => 'MONTSERRAT'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 129,
            'nationality' => 'MOROCCO'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 130,
            'nationality' => 'MOZAMBIQUE'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 131,
            'nationality' => 'MYANMAR (BURMA)'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 132,
            'nationality' => 'NA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 133,
            'nationality' => 'NAMIBIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 134,
            'nationality' => 'NAURU'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 135,
            'nationality' => 'NEPAL'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 136,
            'nationality' => 'NETHERLANDS'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 137,
            'nationality' => 'NETHERLANDS ANTILLES'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 138,
            'nationality' => 'NEW ZEALAND'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 139,
            'nationality' => 'NICARAGUA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 140,
            'nationality' => 'NIGER'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 141,
            'nationality' => 'NIGERIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 142,
            'nationality' => 'NON-RUSSIAN'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 143,
            'nationality' => 'NORWAY'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 144,
            'nationality' => 'NOTHERN MARIANA ISLANDS'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 145,
            'nationality' => 'OMAN'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 146,
            'nationality' => 'OTHERS'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 147,
            'nationality' => 'PAKISTAN'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 148,
            'nationality' => 'PALAU ISLANDS'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 149,
            'nationality' => 'PALESTINE'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 150,
            'nationality' => 'PANAMA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 151,
            'nationality' => 'PAPUA NEW GUINEA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 152,
            'nationality' => 'PARAGUAY'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 153,
            'nationality' => 'PERU'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 154,
            'nationality' => 'PHILIPPINES'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 155,
            'nationality' => 'POLAND'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 156,
            'nationality' => 'PORTUGAL'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 157,
            'nationality' => 'QATAR'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 158,
            'nationality' => 'REPUBLIC DE COTE DIVOIRE'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 159,
            'nationality' => 'REPUBLIC OF BURUNDI'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 160,
            'nationality' => 'REPUBLIC OF CONGO'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 161,
            'nationality' => 'REPUBLIC OF CROATIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 162,
            'nationality' => 'REPUBLIC OF KIRIBATI'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 163,
            'nationality' => 'REPUBLIC OF KOREA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 164,
            'nationality' => 'REPUBLIC OF KOSOVO'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 165,
            'nationality' => 'REPUBLIC OF MACEDONIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 166,
            'nationality' => 'REPUBLIC OF PALAU'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 167,
            'nationality' => 'REPUBLIC OF SLOVENIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 168,
            'nationality' => 'REPUBLIC OF THE MARSHALL ISLANDS'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 169,
            'nationality' => 'REUNION ISLANDS'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 170,
            'nationality' => 'ROM'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 171,
            'nationality' => 'ROMANIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 174,
            'nationality' => 'RUSSIAN FEDERATION'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 175,
            'nationality' => 'RWANDA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 176,
            'nationality' => 'SAINT LUCIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 177,
            'nationality' => 'SAMOA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 178,
            'nationality' => 'SAN MARINO'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 179,
            'nationality' => 'SAO TOMÃ‰ & PRINCIPE'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 180,
            'nationality' => 'SAUDI ARABIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 181,
            'nationality' => 'SENEGAL'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 182,
            'nationality' => 'SERBIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 183,
            'nationality' => 'SEYCHELLES'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 184,
            'nationality' => 'SIERRA LEONE'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 185,
            'nationality' => 'SINGAPORE'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 186,
            'nationality' => 'SLOVAK REPUBLIC'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 187,
            'nationality' => 'SLOVENIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 188,
            'nationality' => 'SOLOMON ISLANDS'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 189,
            'nationality' => 'SOMALIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 190,
            'nationality' => 'SOUTH AFRICA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 191,
            'nationality' => 'SPAIN'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 192,
            'nationality' => 'SRI LANKA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 193,
            'nationality' => 'ST. KITTS & NEVIS'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 194,
            'nationality' => 'ST. LUCIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 195,
            'nationality' => 'ST. VINCENT & THE'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 196,
            'nationality' => 'STATE OF ERITREA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 197,
            'nationality' => 'SUDAN'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 198,
            'nationality' => 'SURINAM'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 199,
            'nationality' => 'SWAZILAND'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 200,
            'nationality' => 'SWEDEN'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 201,
            'nationality' => 'SWITZERLAND'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 202,
            'nationality' => 'SYRIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 203,
            'nationality' => 'TAIWAN'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 204,
            'nationality' => 'TAJIKISTAN'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 205,
            'nationality' => 'TANZANIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 206,
            'nationality' => 'THAILAND'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 207,
            'nationality' => 'THE BAHAMAS'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 208,
            'nationality' => 'THE PHILIPPINES'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 209,
            'nationality' => 'TIBET'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 210,
            'nationality' => 'TOGO'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 211,
            'nationality' => 'TONGA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 212,
            'nationality' => 'TRINIDAD & TOBAGO'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 213,
            'nationality' => 'TUNISIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 214,
            'nationality' => 'TURKEY'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 215,
            'nationality' => 'TURKMENISTAN'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 217,
            'nationality' => 'TUVALU'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 218,
            'nationality' => 'UGANDA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 219,
            'nationality' => 'UKRAINE'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 216,
            'nationality' => 'Ukrainians'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 220,
            'nationality' => 'UN NATION'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 221,
            'nationality' => 'UN OFFICIAL'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 222,
            'nationality' => 'UNITED ARAB EMIRATES'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 223,
            'nationality' => 'UNITED KINGDOM'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 224,
            'nationality' => 'UNITED NATIONS ORGANIZATION'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 225,
            'nationality' => 'UNITED STATES OF AMERICA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 226,
            'nationality' => 'URUGUAY'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 227,
            'nationality' => 'UZBEKISTAN'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 228,
            'nationality' => 'VANUATU'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 229,
            'nationality' => 'VATICAN CITY (HOLY SEE)'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 230,
            'nationality' => 'VENEZUELA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 231,
            'nationality' => 'VIETNAM'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 232,
            'nationality' => 'YEMEN'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 233,
            'nationality' => 'YUGOSLAVIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 234,
            'nationality' => 'ZAMBIA'
        ]);
        $this->insert('client_nationality', [
            'nationality_id' => 235,
            'nationality' => 'ZIMBABWE'
        ]);
    }

    public function down()
    {
        $this->dropTable('client_nationality');
    }
}
