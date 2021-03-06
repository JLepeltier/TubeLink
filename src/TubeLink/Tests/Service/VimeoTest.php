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

use TubeLink\Service\Vimeo;

class VimeoTest extends ServiceTestCase
{
    public function dataForTestParse()
    {
        return array(
            array('http://vimeo.com/15247292', '15247292'),
            array('http://player.vimeo.com/video/15247292?title=0&amp;byline=0&amp;portrait=0&amp;color=bababa', '15247292'),
            array('http://vimeo.com/moogaloop.swf?clip_id=13497165&server=vimeo.com&show_title=1&show_byline=1&show_portrait=0&color=&fullscreen=1', '13497165'),
        );
    }

    public function dataForTestParseFalse()
    {
        return array(
            array('http://vimeo.com/explore'),
        );
    }

    public function dataForTestGenerateEmbedUrl()
    {
        return array(
            array('15247292', 'http://player.vimeo.com/video/15247292'),
        );
    }

    protected function getService()
    {
        return new Vimeo();
    }
}
