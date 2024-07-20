window.TickTackk = window.TickTackk || {}
window.TickTackk.DeveloperTools = window.TickTackk.DeveloperTools || {}

;((window, document) =>
{
    'use strict'

    /**
     * Click event handler to add more phrase block
     */
    TickTackk.DeveloperTools.AddMorePhraseClick = XF.Event.newHandler({
        eventType: 'click',
        eventNameSpace: 'TickTackkDeveloperToolsAddMorePhraseClick',

        options: {
            languageId: null,
            newPhraseBlock: '#new_phrase_block'
        },

        newPhraseBlock: null,

        init ()
        {
            if (this.options.languageId === null)
            {
                console.error('No language ID has been set.')
                return
            }

            const newPhraseBlock = XF.findRelativeIf(
                this.options.newPhraseBlock,
                this.target
            )
            if (!newPhraseBlock)
            {
                console.error('No new phrase block available.')
                return
            }

            this.newPhraseBlock = newPhraseBlock
        },

        click (e)
        {
            XF.ajax('get', 'admin.php?phrases/more-phrase-block', {
                'language_id': this.options.languageId,
                'current_phrase_count': this.getCurrentPhraseCount(),
            }).then(data => this.handleResponse(data))
        },

        getCurrentPhraseCount ()
        {
            const hrs = XF.findRelativeIf('| hr[data-for-more-phrase="true"]', this.newPhraseBlock.parentElement)
            if (!hrs)
            {
                return 0
            }

            return hrs.length
        },

        handleResponse ({ data, response })
        {
            if (!XF.hasOwn(data, 'html'))
            {
                return
            }

            XF.setupHtmlInsert(data.html, (html, container) =>
            {
                XF.display(html, 'none')
                this.newPhraseBlock.append(html)
                XF.activate(html)

                XF.Animate.fadeDown(html, {
                    speed: XF.config.speed.xfast,
                })
            })
        },
    })

    XF.Event.register('click', 'new-phrase-block-adder', 'TickTackk.DeveloperTools.AddMorePhraseClick')
})(window, document)