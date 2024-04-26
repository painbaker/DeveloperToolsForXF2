window.TickTackk = window.TickTackk || {}
window.TickTackk.DeveloperTools = window.TickTackk.DeveloperTools || {}

;((window, document) =>
{
    'use strict'

    /**
     * This helps in creating code event listeners fast enough
     */
    TickTackk.DeveloperTools.CodeEventFieldLoader = XF.Element.newHandler({
        options: {
            container: '< form',
            callbackClassInput: '[name="callback_class"]',
            callbackMethodInput: '[name="callback_method"]',
            addOnSelect: '[name="addon_id"]'
        },

        container: null,
        callbackClass: null,
        callbackMethod: null,
        addOn: null,

        init ()
        {
            const container = XF.findRelativeIf(
                this.options.container,
                this.target
            )
            if (!container)
            {
                console.error('No event select container found for %o', this.target)
            }

            const callbackClass = XF.findRelativeIf(
                this.options.callbackClassInput,
                container
            )
            if (!callbackClass)
            {
                console.error('No callback class input found for %o', container)
                return
            }

            const callbackMethod = XF.findRelativeIf(
                this.options.callbackMethodInput,
                container
            )
            if (!callbackMethod)
            {
                console.error('No callback method input found for %o', container)
                return
            }

            const addOn = XF.findRelativeIf(
                this.options.addOnSelect,
                container
            )
            if (!addOn)
            {
                console.error('No add-on select input found for %o', container)
                return
            }

            this.container = container
            this.callbackClass = callbackClass
            this.callbackMethod = callbackMethod
            this.addOn = addOn

            XF.on(this.target, 'change', this.setInputs.bind(this))
            XF.on(this.addOn, 'change', this.setInputs.bind(this))
        },

        setInputs ()
        {
            const addOnId = this.getSelectedAddOnId(),
                callbackClass = this.getCallbackClass(addOnId),
                callbackMethod = this.getCallbackMethod(this.target.value)

            console.log(this.addOn, addOnId, callbackClass, callbackMethod)

            if (callbackClass.length)
            {
                this.callbackClass.value = callbackClass
            }

            if (callbackMethod.length)
            {
                this.callbackMethod.value = callbackMethod
            }
        },

        getSelectedAddOnId ()
        {
            const addOnId = this.addOn.value
            if (addOnId === '')
            {
                return null
            }

            return addOnId
        },

        getCallbackClass (addOnId)
        {
            if (addOnId === null)
            {
                return ''
            }

            return addOnId.replace('/', '\\') + '\\Listener'
        },

        getCallbackMethod (eventId)
        {
            const tmpEventId = eventId.toLowerCase().trim()
            if (tmpEventId === '')
            {
                return ''
            }

            return tmpEventId.replace(/[^a-zA-Z0-9]+(.)/g, function (match, characterData)
            {
                return characterData.toUpperCase()
            })
        }
    })

    XF.Element.register('code-event-field-loader', 'TickTackk.DeveloperTools.CodeEventFieldLoader')
})(window, document)