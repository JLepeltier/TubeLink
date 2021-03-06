<?php
/*
 * This file is part of the TubeLink package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @licence MIT
 */

namespace TubeLink\Tests\Service;

use TubeLink\Service\Youtube;

class YoutubeTest extends ServiceTestCase
{
    public function dataForTestParse()
    {
        return array(
            array('http://www.youtube.com/watch?v=gHYfY9lZaRE&feature=g-vrec', 'gHYfY9lZaRE'),
            array('http://youtube.com/watch?v=gHYfY9lZaRE&feature=g-vrec', 'gHYfY9lZaRE'),
            array('http://www.youtube.fr/watch?v=gHYfY9lZaRE', 'gHYfY9lZaRE'),
            array('http://www.youtube.com/watch?gl=FR&hl=fr&v=gHYfY9lZaRE#share', 'gHYfY9lZaRE'),
            array('http://www.youtube.com/all_comments?v=gHYfY9lZaRE', 'gHYfY9lZaRE'),
            array('http://youtu.be/gHYfY9lZaRE', 'gHYfY9lZaRE'),
            array('http://www.youtu.be/gHYfY9lZaRE', 'gHYfY9lZaRE'),
            array('http://www.youtu.be/gHYfY9lZaRE/?feature=g-vrec', 'gHYfY9lZaRE'),
            array('http://www.youtube.com/embed/gHYfY9lZaRE', 'gHYfY9lZaRE'),
            array('http://www.youtube.com/embed/P-8llsSbVDc?rel=0', 'P-8llsSbVDc'),
            array('http://www.youtube-nocookie.com/embed/P-8llsSbVDc?rel=0', 'P-8llsSbVDc'),
            array('http://www.youtube.com/v/uPgLxYUHRcg?fs=1&hl=fr_FR', 'uPgLxYUHRcg'),
            array('http://www.youtube-nocookie.com/v/Kw_yO2utN0c?fs=1&hl=fr_FR', 'Kw_yO2utN0c'),
            array('http://www.youtube.com/p/18DCC2CD9CCCCB91?hl=fr_FR&fs=1', '18DCC2CD9CCCCB91'),
        );
    }

    public function dataForTestParseFalse()
    {
        return array(
            array('http://www.youtube.com/watch?v=HYfY9lZaRE'), // Invalid ID
            array('http://www.youtu.be/HYfY9lZaRE'), // Invalid ID
        );
    }

    public function dataForTestGenerateEmbedUrl()
    {
        return array(
            array('gHYfY9lZaRE', 'http://www.youtube.com/embed/gHYfY9lZaRE'),
        );
    }

    protected function getService()
    {
        return new Youtube();
    }
}
