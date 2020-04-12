<?php

namespace Core;

class TemplateEngine
{
    public static function parse($tmp)
    {
        $tmp = preg_replace_callback(
            '/(\@(if|elseif|foreach|isset|empty))\s?(\(.+\))\s/',
            function ($match) {
                if ($match[2] == 'isset' || $match[2] == 'empty') {
                    return str_replace($match[1], "<?php if($match[2]", $match[0]) . "): ?>";
                } else {
                    return str_replace($match[1], "<?php $match[2]", $match[0]) . ": ?>";
                }
            },
            $tmp
        );

        $tmp = str_replace(
            ['@else', '@endif', '@endforeach', '@endisset', '@endempty', '{{', '}}'],
            ['<?php else: ?>', '<?php endif; ?>', '<?php endforeach; ?>', '<?php endif; ?>', '<?php endif; ?>', '<?=htmlentities(', '); ?>'],
            $tmp
        );

        file_put_contents('./tmp.php', $tmp);
    }
}