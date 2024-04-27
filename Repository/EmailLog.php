<?php

namespace TickTackk\DeveloperTools\Repository;

use Symfony\Component\Mime\Email;
use XF\Mvc\Entity\Finder;
use XF\Mvc\Entity\Repository;
use TickTackk\DeveloperTools\Finder\EmailLog as EmailLogFinder;
use Swift_Mime_SimpleMessage as SwiftMessage;
use XF\Mvc\Entity\Manager as EntityManager;
use TickTackk\DeveloperTools\Entity\EmailLog as EmailLogEntity;
use Symfony\Component\Mime\Address;

/**
 * Class EmailLog
 *
 * @package TickTackk\DeveloperTools\Repository
 */
class EmailLog extends Repository
{
    public function findEmailLogForList() : EmailLogFinder
    {
        return $this->getEmailLogFinder()->setDefaultOrder('log_date', 'DESC');
    }

    /**
     * @since 1.5.0
     *
     * @param SwiftMessage|Email $messageOrEmail
     *
     * @return array
     */
    protected function getMessageOrEmailData($messageOrEmail) : array
    {
        $emailData = [];

        if (($messageOrEmail instanceof SwiftMessage) || ($messageOrEmail instanceof Email))
        {
            $emailData = array_merge($emailData, [
                'subject' => $messageOrEmail->getSubject(),
                'return_path' => $messageOrEmail->getReturnPath(),
                'sender' => $messageOrEmail->getSender(),
                'from' => $messageOrEmail->getFrom(),
                'reply_to' => $messageOrEmail->getReplyTo(),
                'to' => $messageOrEmail->getTo(),
                'cc' => $messageOrEmail->getCc(),
                'bcc' => $messageOrEmail->getBcc()
            ]);
        }

        if ($messageOrEmail instanceof SwiftMessage)
        {
            $htmlMessageSet = false;
            $textMessageSet = false;

            foreach ($messageOrEmail->getChildren() AS $mimeEntity)
            {
                if (!$htmlMessageSet && $mimeEntity->getContentType() === 'text/html')
                {
                    $emailData['html_message'] = $mimeEntity->getBody();
                    $htmlMessageSet = true;
                }

                if (!$textMessageSet && $mimeEntity->getContentType() === 'text/plain')
                {
                    $emailData['text_message'] = $mimeEntity->getBody();
                    $textMessageSet = true;
                }

                if ($htmlMessageSet && $textMessageSet)
                {
                    break;
                }
            }
        }
        else if ($messageOrEmail instanceof Email)
        {
            $addressKeys = ['return_path', 'sender', 'from', 'reply_to', 'to', 'cc', 'bcc'];
            foreach ($emailData AS $column => $value)
            {
                if (!in_array($column, $addressKeys))
                {
                    continue;
                }

                if ($value === null)
                {
                    continue;
                }

                $isArr = true;
                if ($value instanceof Email)
                {
                    $value = [$value];
                    $isArr = false;
                }

                $newValue = [];
                /** @var Address $address */
                foreach ($value AS $address)
                {
                    $tmpAddrArr = [
                        $address->getAddress(),
                        $address->getName()
                    ];

                    if ($isArr)
                    {
                        $newValue[] = $tmpAddrArr;
                    }
                    else
                    {
                        $newValue = $tmpAddrArr;
                    }
                }
                $emailData[$column] = $newValue;
            }

            $emailData['html_message'] = $messageOrEmail->getHtmlBody();
            $emailData['text_message'] = $messageOrEmail->getTextBody();
        }

        return $emailData;
    }

    /**
     * @version 1.5.0
     *
     * @param SwiftMessage|Email $messageOrEmail
     *
     * @throws \XF\PrintableException
     */
    public function log($messageOrEmail) : void
    {
        $emailData = $this->getMessageOrEmailData($messageOrEmail);

        /** @var EmailLogEntity $emailLog */
        $emailLog = $this->em()->create('TickTackk\DeveloperTools:EmailLog');
        $emailLog->log_date = time();
        $emailLog->bulkSet($emailData);
        $emailLog->save();
    }

    public function clearEmailLog() : void
    {
        $this->db()->emptyTable('xf_tck_developer_tools_email_log');
    }

    /**
     * @return Finder|EmailLogFinder
     */
    public function getEmailLogFinder() : EmailLogFinder
    {
        return $this->finder('TickTackk\DeveloperTools:EmailLog');
    }

    protected function em() : EntityManager
    {
        return $this->em;
    }
}