<?php

namespace App\Enums;

use App\Traits\EnumMethods;

enum CountryCode: string
{
    use EnumMethods;

    case AP = 'AP'; // Organização Regional Africana da Propriedade Industrial (ARIPO)
    case AR = 'AR'; // Argentina
    case AT = 'AT'; // Áustria
    case AU = 'AU'; // Austrália
    case BA = 'BA'; // Bósnia e Herzegovina
    case BE = 'BE'; // Bélgica
    case BG = 'BG'; // Bulgária
    case BR = 'BR'; // Brasil
    case CA = 'CA'; // Canadá
    case CH = 'CH'; // Suíça
    case CN = 'CN'; // China
    case CS = 'CS'; // Checoslováquia (até 1993)
    case CU = 'CU'; // Cuba
    case CY = 'CY'; // Chipre
    case CZ = 'CZ'; // República Checa
    case DD = 'DD'; // Alemanha (excluindo o território que, antes de 3 de Outubro de 1990, constituía a República Federal da Alemanha)
    case DE = 'DE'; // Alemanha
    case DK = 'DK'; // Dinamarca
    case DZ = 'DZ'; // Argélia
    case EA = 'EA'; // Organização Euroasiática de Patentes
    case EE = 'EE'; // Estónia
    case EG = 'EG'; // Egito
    case EP = 'EP'; // Organização Europeia de Patentes (OPE/EPO)
    case ES = 'ES'; // Espanha
    case FI = 'FI'; // Finlândia
    case FR = 'FR'; // França
    case GB = 'GB'; // Reino Unido
    case GR = 'GR'; // Grécia
    case HK = 'HK'; // Hong Kong
    case HR = 'HR'; // Croácia
    case HU = 'HU'; // Hungria
    case IE = 'IE'; // Irlanda
    case IL = 'IL'; // Israel
    case IN = 'IN'; // Índia
    case IT = 'IT'; // Itália
    case JP = 'JP'; // Japão
    case KE = 'KE'; // Quénia
    case KR = 'KR'; // República da Coreia
    case LT = 'LT'; // Lituânia
    case LU = 'LU'; // Luxemburgo
    case LV = 'LV'; // Letónia
    case MC = 'MC'; // Mónaco
    case MD = 'MD'; // República da Moldávia
    case MN = 'MN'; // Mongólia
    case MT = 'MT'; // Malta
    case MW = 'MW'; // Malawi
    case MX = 'MX'; // México
    case MY = 'MY'; // Malásia
    case NC = 'NC'; // Nova Caledónia
    case NL = 'NL'; // Holanda
    case NO = 'NO'; // Noruega
    case NZ = 'NZ'; // Nova Zelândia
    case OA = 'OA'; // Organização Africana da Propriedade Intelectual (OAPI)
    case PH = 'PH'; // Filipinas
    case PL = 'PL'; // Polónia
    case PT = 'PT'; // Portugal
    case RO = 'RO'; // Roménia
    case RU = 'RU'; // Federação Russa
    case SE = 'SE'; // Suécia
    case SG = 'SG'; // Singapura
    case SI = 'SI'; // Eslovénia
    case SK = 'SK'; // Eslováquia
    case SU = 'SU'; // União das Repúblicas Socialistas Soviéticas (URSS)
    case TJ = 'TJ'; // Tadjiquistão
    case TR = 'TR'; // Turquia
    case TT = 'TT'; // Trindade e Tobago
    case TW = 'TW'; // Taiwan
    case US = 'US'; // Estados Unidos da América
    case VN = 'VN'; // Vietname
    case WO = 'WO'; // Organização Mundial da Propriedade Intelectual (OMPI/WIPO)
    case YU = 'YU'; // Jugoslávia
    case ZA = 'ZA'; // África do Sul
    case ZM = 'ZM'; // Zâmbia
    case ZW = 'ZW'; // Zimbabwe
}
