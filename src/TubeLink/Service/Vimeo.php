<?php
/*
 * This file is part of the TubeLink package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @licence MIT
 */

namespace TubeLink\Service;

use TubeLink\Tube;

class Vimeo implements ServiceInterface
{
    /**
     * {@inheritDoc}
     */
    public function parse($url)
    {
        $data  = parse_url($url);
        if (empty($data['host'])) {
            return false;
        }
        if (false !== strpos($data['host'], 'vimeo.com')) {
            if (preg_match('#^/(video/)?([0-9]+)?$#', $data['path'], $matches)) {
                $id = $matches[2];
            } else {
                $query = array();
                if (isset($data['query'])) {
                    parse_str($data['query'], $query);
                }
                if (!empty($query['clip_id']))
                {
                   $id = $query['clip_id'];
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }

        $video = new Tube($this);
        $video->id = $id;

        return $video;
    }

    /**
     * {@inheritDoc}
     */
    public function generateEmbedUrl(Tube $video)
    {
        return sprintf('http://player.vimeo.com/video/%s', $video->id);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'vimeo';
    }
}
