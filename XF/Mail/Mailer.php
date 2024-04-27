<?php

namespace TickTackk\DeveloperTools\XF\Mail;

class_alias(\XF::$versionId < 2020000
    ? 'TickTackk\DeveloperTools\XF\Mail\XF2\Mailer'
    : (\XF::$versionId >= 2030000
        ? 'TickTackk\DeveloperTools\XF\Mail\XF23\Mailer'
        : 'TickTackk\DeveloperTools\XF\Mail\XF22\Mailer'),
    'TickTackk\DeveloperTools\XF\Mail\Mailer');

class_alias(
    'TickTackk\DeveloperTools\XF\Mail\XFCP_Mailer',
    \XF::$versionId >= 2020000
        ? (\XF::$versionId >= 2030000
        ? 'TickTackk\DeveloperTools\XF\Mail\XF23\XFCP_Mailer'
        : 'TickTackk\DeveloperTools\XF\Mail\XF22\XFCP_Mailer'
    ) : 'TickTackk\DeveloperTools\XF\Mail\XF2\XFCP_Mailer',
    false
);