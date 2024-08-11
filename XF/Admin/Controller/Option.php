<?php

namespace TickTackk\DeveloperTools\XF\Admin\Controller;

use XF\Entity\Option as OptionEntity;
use XF\Entity\OptionGroup as OptionGroupEntity;
use XF\Mvc\Entity\ArrayCollection;
use XF\Mvc\ParameterBag;
use XF\Mvc\Reply\View as ViewReply;
use XF\Mvc\Reply\Redirect as RedirectReply;
use XF\Mvc\Reply\Exception as ExceptionReply;

/**
 * Class Option
 *
 * @package TickTackk\DeveloperTools\XF\Admin\Controller
 */
class Option extends XFCP_Option
{
    /**
     * @param OptionEntity $option
     * @param array        $baseRelations
     *
     * @return View
     */
    public function optionAddEdit(OptionEntity $option, $baseRelations = [])
    {
        $reply = parent::optionAddEdit($option, $baseRelations);

        if ($reply instanceof View && !$option->exists() && $this->request()->exists('group_id'))
        {
            /** @var ArrayCollection|OptionGroupEntity[] $groups */
            $groups = $reply->getParam('groups');

            /** @var OptionGroupEntity $group */
            $group = $groups[$this->filter('group_id', 'str')] ?? false;
            if ($group)
            {
                $reply->setParam('group', $group);
            }
        }

        return $reply;
    }

    /**
     * @since 1.5.1
     *
     * @param ParameterBag $params
     *
     * @return RedirectReply|ViewReply
     *
     * @throws ExceptionReply
     */
    public function actionEmailTransportSetup(ParameterBag $params)
    {
        $option = $this->assertEmailTransportOption($params->option_id);

        $newType = $this->filter('new_type', 'str');
        if ($this->isPost() && ($newType === 'file'))
        {
            $optionValue = ['emailTransport' => $newType];
            $this->getOptionRepo()->updateOption($option->option_id, $optionValue);

            return $this->redirect($this->getDynamicRedirect());
        }

        return parent::actionEmailTransportSetup($params);
    }
}