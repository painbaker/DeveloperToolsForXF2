<?php

namespace TickTackk\DeveloperTools\XF\Mail;

if (\XF::$versionId < 2020000)
{
    \SV\StandardLib\Helper::repo()->aliasClass(
        'TickTackk\DeveloperTools\XF\Mail\Mailer',
        'TickTackk\DeveloperTools\XF\Mail\XF2\Mailer'
    );
}
else if (\XF::$versionId >= 2020000 && \XF::$versionId < 2030031)
{
    \SV\StandardLib\Helper::repo()->aliasClass(
        'TickTackk\DeveloperTools\XF\Mail\Mailer',
        'TickTackk\DeveloperTools\XF\Mail\XF22\Mailer'
    );
}
else if (\XF::$versionId >= 2030031 && \XF::$versionId < 2030036)
{
    \SV\StandardLib\Helper::repo()->aliasClass(
        'TickTackk\DeveloperTools\XF\Mail\Mailer',
        'TickTackk\DeveloperTools\XF\Mail\XF23B1\Mailer'
    );
}
else if (\XF::$versionId >= 2030036 && \XF::$versionId < 2030052)
{
    \SV\StandardLib\Helper::repo()->aliasClass(
        'TickTackk\DeveloperTools\XF\Mail\Mailer',
        'TickTackk\DeveloperTools\XF\Mail\XF23B6\Mailer'
    );
}
else if (\XF::$versionId >= 2030053)
{
    \SV\StandardLib\Helper::repo()->aliasClass(
        'TickTackk\DeveloperTools\XF\Mail\Mailer',
        'TickTackk\DeveloperTools\XF\Mail\XF23RC3\Mailer'
    );
}