<?php namespace PhpMimeMailParser;

use PhpMimeMailParser\Contracts\CharsetManager;

/**
 * @see \Tests\PhpMimeMailParser\CharsetTest
 */
final class Charset implements CharsetManager
{
    /**
     * Charset Aliases
     * @var string[]
     */
    private $charsetAlias = [
        'ascii'                    => 'us-ascii',
        'us-ascii'                 => 'us-ascii',
        'ansi_x3.4-1968'           => 'us-ascii',
        '646'                      => 'us-ascii',
        'iso-8859-1'               => 'iso-8859-1',
        'iso-8859-2'               => 'iso-8859-2',
        'iso-8859-3'               => 'iso-8859-3',
        'iso-8859-4'               => 'iso-8859-4',
        'iso-8859-5'               => 'iso-8859-5',
        'iso-8859-6'               => 'iso-8859-6',
        'iso-8859-6-i'             => 'iso-8859-6-i',
        'iso-8859-6-e'             => 'iso-8859-6-e',
        'iso-8859-7'               => 'iso-8859-7',
        'iso-8859-8'               => 'iso-8859-8',
        'iso-8859-8-i'             => 'iso-8859-8',
        'iso-8859-8-e'             => 'iso-8859-8-e',
        'iso-8859-9'               => 'iso-8859-9',
        'iso-8859-10'              => 'iso-8859-10',
        'iso-8859-11'              => 'iso-8859-11',
        'iso-8859-13'              => 'iso-8859-13',
        'iso-8859-14'              => 'iso-8859-14',
        'iso-8859-15'              => 'iso-8859-15',
        'iso-8859-16'              => 'iso-8859-16',
        'iso-ir-111'               => 'iso-ir-111',
        'iso-2022-cn'              => 'iso-2022-cn',
        'iso-2022-cn-ext'          => 'iso-2022-cn',
        'iso-2022-kr'              => 'iso-2022-kr',
        'iso-2022-jp'              => 'iso-2022-jp',
        'iso-2022-jp-ms'           => 'iso-2022-jp',
        'utf-16be'                 => 'utf-16be',
        'utf-16le'                 => 'utf-16le',
        'utf-16'                   => 'utf-16',
        'windows-1250'             => 'windows-1250',
        'windows-1251'             => 'windows-1251',
        'windows-1252'             => 'windows-1252',
        'windows-1253'             => 'windows-1253',
        'windows-1254'             => 'windows-1254',
        'windows-1255'             => 'windows-1255',
        'windows-1256'             => 'windows-1256',
        'windows-1257'             => 'windows-1257',
        'windows-1258'             => 'windows-1258',
        'ibm866'                   => 'ibm866',
        'ibm850'                   => 'ibm850',
        'ibm852'                   => 'ibm852',
        'ibm855'                   => 'ibm855',
        'ibm857'                   => 'ibm857',
        'ibm862'                   => 'ibm862',
        'ibm864'                   => 'ibm864',
        'utf-8'                    => 'utf-8',
        'utf-7'                    => 'utf-7',
        'shift_jis'                => 'shift_jis',
        'big5'                     => 'big5',
        'euc-jp'                   => 'euc-jp',
        'euc-kr'                   => 'euc-kr',
        'euc-cn'                   => 'gb2312',
        'gb2312'                   => 'gb2312',
        'gb18030'                  => 'gb18030',
        'viscii'                   => 'viscii',
        'koi8-r'                   => 'koi8-r',
        'koi8_r'                   => 'koi8-r',
        'cskoi8r'                  => 'koi8-r',
        'koi'                      => 'koi8-r',
        'koi8'                     => 'koi8-r',
        'koi8-u'                   => 'koi8-u',
        'tis-620'                  => 'tis-620',
        't.61-8bit'                => 't.61-8bit',
        'hz-gb-2312'               => 'hz-gb-2312',
        'big5-hkscs'               => 'big5-hkscs',
        'gbk'                      => 'gbk',
        'cns11643'                 => 'x-euc-tw',
        'x-imap4-modified-utf7'    => 'x-imap4-modified-utf7',
        'x-euc-tw'                 => 'x-euc-tw',
        'x-mac-ce'                 => 'macce',
        'x-mac-turkish'            => 'macturkish',
        'x-mac-greek'              => 'macgreek',
        'x-mac-icelandic'          => 'macicelandic',
        'x-mac-croatian'           => 'maccroatian',
        'x-mac-romanian'           => 'macromanian',
        'x-mac-cyrillic'           => 'maccyrillic',
        'x-mac-ukrainian'          => 'macukrainian',
        'x-mac-hebrew'             => 'machebrew',
        'x-mac-arabic'             => 'macarabic',
        'x-mac-farsi'              => 'macfarsi',
        'x-mac-devanagari'         => 'macdevanagari',
        'x-mac-gujarati'           => 'macgujarati',
        'x-mac-gurmukhi'           => 'macgurmukhi',
        'armscii-8'                => 'armscii-8',
        'x-viet-tcvn5712'          => 'x-viet-tcvn5712',
        'x-viet-vps'               => 'x-viet-vps',
        'iso-10646-ucs-2'          => 'utf-16be',
        'x-iso-10646-ucs-2-be'     => 'utf-16be',
        'x-iso-10646-ucs-2-le'     => 'utf-16le',
        'x-user-defined'           => 'x-user-defined',
        'x-johab'                  => 'x-johab',
        'latin1'                   => 'iso-8859-1',
        'iso_8859-1'               => 'iso-8859-1',
        'iso8859-1'                => 'iso-8859-1',
        'iso8859-2'                => 'iso-8859-2',
        'iso8859-3'                => 'iso-8859-3',
        'iso8859-4'                => 'iso-8859-4',
        'iso8859-5'                => 'iso-8859-5',
        'iso8859-6'                => 'iso-8859-6',
        'iso8859-7'                => 'iso-8859-7',
        'iso8859-8'                => 'iso-8859-8',
        'iso8859-9'                => 'iso-8859-9',
        'iso8859-10'               => 'iso-8859-10',
        'iso8859-11'               => 'iso-8859-11',
        'iso8859-13'               => 'iso-8859-13',
        'iso8859-14'               => 'iso-8859-14',
        'iso8859-15'               => 'iso-8859-15',
        'iso_8859-1:1987'          => 'iso-8859-1',
        'iso-ir-100'               => 'iso-8859-1',
        'l1'                       => 'iso-8859-1',
        'ibm819'                   => 'iso-8859-1',
        'cp819'                    => 'iso-8859-1',
        'csisolatin1'              => 'iso-8859-1',
        'latin2'                   => 'iso-8859-2',
        'iso_8859-2'               => 'iso-8859-2',
        'iso_8859-2:1987'          => 'iso-8859-2',
        'iso-ir-101'               => 'iso-8859-2',
        'l2'                       => 'iso-8859-2',
        'csisolatin2'              => 'iso-8859-2',
        'latin3'                   => 'iso-8859-3',
        'iso_8859-3'               => 'iso-8859-3',
        'iso_8859-3:1988'          => 'iso-8859-3',
        'iso-ir-109'               => 'iso-8859-3',
        'l3'                       => 'iso-8859-3',
        'csisolatin3'              => 'iso-8859-3',
        'latin4'                   => 'iso-8859-4',
        'iso_8859-4'               => 'iso-8859-4',
        'iso_8859-4:1988'          => 'iso-8859-4',
        'iso-ir-110'               => 'iso-8859-4',
        'l4'                       => 'iso-8859-4',
        'csisolatin4'              => 'iso-8859-4',
        'cyrillic'                 => 'iso-8859-5',
        'iso_8859-5'               => 'iso-8859-5',
        'iso_8859-5:1988'          => 'iso-8859-5',
        'iso-ir-144'               => 'iso-8859-5',
        'csisolatincyrillic'       => 'iso-8859-5',
        'arabic'                   => 'iso-8859-6',
        'iso_8859-6'               => 'iso-8859-6',
        'iso_8859-6:1987'          => 'iso-8859-6',
        'iso-ir-127'               => 'iso-8859-6',
        'ecma-114'                 => 'iso-8859-6',
        'asmo-708'                 => 'iso-8859-6',
        'csisolatinarabic'         => 'iso-8859-6',
        'csiso88596i'              => 'iso-8859-6-i',
        'csiso88596e'              => 'iso-8859-6-e',
        'greek'                    => 'iso-8859-7',
        'greek8'                   => 'iso-8859-7',
        'sun_eu_greek'             => 'iso-8859-7',
        'iso_8859-7'               => 'iso-8859-7',
        'iso_8859-7:1987'          => 'iso-8859-7',
        'iso-ir-126'               => 'iso-8859-7',
        'elot_928'                 => 'iso-8859-7',
        'ecma-118'                 => 'iso-8859-7',
        'csisolatingreek'          => 'iso-8859-7',
        'hebrew'                   => 'iso-8859-8',
        'iso_8859-8'               => 'iso-8859-8',
        'visual'                   => 'iso-8859-8',
        'iso_8859-8:1988'          => 'iso-8859-8',
        'iso-ir-138'               => 'iso-8859-8',
        'csisolatinhebrew'         => 'iso-8859-8',
        'csiso88598i'              => 'iso-8859-8',
        'iso-8859-8i'              => 'iso-8859-8',
        'logical'                  => 'iso-8859-8',
        'csiso88598e'              => 'iso-8859-8-e',
        'latin5'                   => 'iso-8859-9',
        'iso_8859-9'               => 'iso-8859-9',
        'iso_8859-9:1989'          => 'iso-8859-9',
        'iso-ir-148'               => 'iso-8859-9',
        'l5'                       => 'iso-8859-9',
        'csisolatin5'              => 'iso-8859-9',
        'unicode-1-1-utf-8'        => 'utf-8',
        'utf8'                     => 'utf-8',
        'x-sjis'                   => 'shift_jis',
        'shift-jis'                => 'shift_jis',
        'ms_kanji'                 => 'shift_jis',
        'csshiftjis'               => 'shift_jis',
        'windows-31j'              => 'shift_jis',
        'cp932'                    => 'shift_jis',
        'sjis'                     => 'shift_jis',
        'cseucpkdfmtjapanese'      => 'euc-jp',
        'x-euc-jp'                 => 'euc-jp',
        'csiso2022jp'              => 'iso-2022-jp',
        'iso-2022-jp-2'            => 'iso-2022-jp',
        'csiso2022jp2'             => 'iso-2022-jp',
        'csbig5'                   => 'big5',
        'cn-big5'                  => 'big5',
        'x-x-big5'                 => 'big5',
        'zh_tw-big5'               => 'big5',
        'cseuckr'                  => 'euc-kr',
        'ks_c_5601-1987'           => 'euc-kr',
        'iso-ir-149'               => 'euc-kr',
        'ks_c_5601-1989'           => 'euc-kr',
        'ksc_5601'                 => 'euc-kr',
        'ksc5601'                  => 'euc-kr',
        'korean'                   => 'euc-kr',
        'csksc56011987'            => 'euc-kr',
        '5601'                     => 'euc-kr',
        'windows-949'              => 'euc-kr',
        'gb_2312-80'               => 'gb2312',
        'iso-ir-58'                => 'gb2312',
        'chinese'                  => 'gb2312',
        'csiso58gb231280'          => 'gb2312',
        'csgb2312'                 => 'gb2312',
        'zh_cn.euc'                => 'gb2312',
        'gb_2312'                  => 'gb2312',
        'x-cp1250'                 => 'windows-1250',
        'x-cp1251'                 => 'windows-1251',
        'x-cp1252'                 => 'windows-1252',
        'x-cp1253'                 => 'windows-1253',
        'x-cp1254'                 => 'windows-1254',
        'x-cp1255'                 => 'windows-1255',
        'x-cp1256'                 => 'windows-1256',
        'x-cp1257'                 => 'windows-1257',
        'x-cp1258'                 => 'windows-1258',
        'windows-874'              => 'windows-874',
        'ibm874'                   => 'windows-874',
        'dos-874'                  => 'windows-874',
        'macintosh'                => 'macintosh',
        'x-mac-roman'              => 'macintosh',
        'mac'                      => 'macintosh',
        'csmacintosh'              => 'macintosh',
        'cp866'                    => 'ibm866',
        'cp-866'                   => 'ibm866',
        '866'                      => 'ibm866',
        'csibm866'                 => 'ibm866',
        'cp850'                    => 'ibm850',
        '850'                      => 'ibm850',
        'csibm850'                 => 'ibm850',
        'cp852'                    => 'ibm852',
        '852'                      => 'ibm852',
        'csibm852'                 => 'ibm852',
        'cp855'                    => 'ibm855',
        '855'                      => 'ibm855',
        'csibm855'                 => 'ibm855',
        'cp857'                    => 'ibm857',
        '857'                      => 'ibm857',
        'csibm857'                 => 'ibm857',
        'cp862'                    => 'ibm862',
        '862'                      => 'ibm862',
        'csibm862'                 => 'ibm862',
        'cp864'                    => 'ibm864',
        '864'                      => 'ibm864',
        'csibm864'                 => 'ibm864',
        'ibm-864'                  => 'ibm864',
        't.61'                     => 't.61-8bit',
        'iso-ir-103'               => 't.61-8bit',
        'csiso103t618bit'          => 't.61-8bit',
        'x-unicode-2-0-utf-7'      => 'utf-7',
        'unicode-2-0-utf-7'        => 'utf-7',
        'unicode-1-1-utf-7'        => 'utf-7',
        'csunicode11utf7'          => 'utf-7',
        'csunicode'                => 'utf-16be',
        'csunicode11'              => 'utf-16be',
        'iso-10646-ucs-basic'      => 'utf-16be',
        'csunicodeascii'           => 'utf-16be',
        'iso-10646-unicode-latin1' => 'utf-16be',
        'csunicodelatin1'          => 'utf-16be',
        'iso-10646'                => 'utf-16be',
        'iso-10646-j-1'            => 'utf-16be',
        'latin6'                   => 'iso-8859-10',
        'iso-ir-157'               => 'iso-8859-10',
        'l6'                       => 'iso-8859-10',
        'csisolatin6'              => 'iso-8859-10',
        'iso_8859-15'              => 'iso-8859-15',
        'csisolatin9'              => 'iso-8859-15',
        'l9'                       => 'iso-8859-15',
        'ecma-cyrillic'            => 'iso-ir-111',
        'csiso111ecmacyrillic'     => 'iso-ir-111',
        'csiso2022kr'              => 'iso-2022-kr',
        'csviscii'                 => 'viscii',
        'zh_tw-euc'                => 'x-euc-tw',
        'iso88591'                 => 'iso-8859-1',
        'iso88592'                 => 'iso-8859-2',
        'iso88593'                 => 'iso-8859-3',
        'iso88594'                 => 'iso-8859-4',
        'iso88595'                 => 'iso-8859-5',
        'iso88596'                 => 'iso-8859-6',
        'iso88597'                 => 'iso-8859-7',
        'iso88598'                 => 'iso-8859-8',
        'iso88599'                 => 'iso-8859-9',
        'iso885910'                => 'iso-8859-10',
        'iso885911'                => 'iso-8859-11',
        'iso885912'                => 'iso-8859-12',
        'iso885913'                => 'iso-8859-13',
        'iso885914'                => 'iso-8859-14',
        'iso885915'                => 'iso-8859-15',
        'tis620'                   => 'tis-620',
        'cp1250'                   => 'windows-1250',
        'cp1251'                   => 'windows-1251',
        'cp1252'                   => 'windows-1252',
        'cp1253'                   => 'windows-1253',
        'cp1254'                   => 'windows-1254',
        'cp1255'                   => 'windows-1255',
        'cp1256'                   => 'windows-1256',
        'cp1257'                   => 'windows-1257',
        'cp1258'                   => 'windows-1258',
        'x-gbk'                    => 'gbk',
        'windows-936'              => 'gbk',
        'ansi-1251'                => 'windows-1251',
    ];

    /**
     * {@inheritdoc}
     */
    public function decodeCharset(string $encodedString, string $charset): string
    {
        $charset = $this->getCharsetAlias($charset);

        if ($charset == 'utf-8') {
            return $encodedString;
        }

        if ($charset == 'us-ascii') {
            return utf8_encode($encodedString);
        }

        if ($charset == 'iso-2022-jp') {
            return mb_convert_encoding($encodedString, 'utf-8', 'iso-2022-jp-ms');
        }

        if (in_array($charset, $this->getSupportedEncodings())) {
            return mb_convert_encoding($encodedString, 'utf-8', $charset);
        }

        // We're using 'ignore' flag here, but still cast to string to make type checkers satisfied
        return (string) iconv($charset, 'utf-8//translit//ignore', $encodedString);
    }

    /**
     * {@inheritdoc}
     */
    public function getCharsetAlias(string $charset): string
    {
        $charset = strtolower($charset);

        if (array_key_exists($charset, $this->charsetAlias)) {
            return $this->charsetAlias[$charset];
        }

        return 'us-ascii';
    }

    /**
     * @var mixed[]|string[]
     */
    private $encodings;

    private function getSupportedEncodings(): array
    {
        if (null !== $this->encodings) {
            return $this->encodings;
        }

        $this->encodings = mb_list_encodings();

        $aliases = array_map('mb_encoding_aliases', $this->encodings);

        $this->encodings = array_merge($this->encodings, ...$aliases);
        $this->encodings = array_unique($this->encodings);
        $this->encodings = array_map('strtolower', $this->encodings);

        return $this->encodings;
    }
}