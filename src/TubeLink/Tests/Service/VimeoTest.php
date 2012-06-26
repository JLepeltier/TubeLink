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
        );
    }

    public function dataForTestParseFalse()
    {
        return array(
            array('http://vimeo.com/explore'),
        );
    }

    protected function getService()
    {
        return new Vimeo();
    }
}
