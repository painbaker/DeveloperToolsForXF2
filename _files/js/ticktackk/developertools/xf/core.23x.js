window.TickTackk = window.TickTackk || {}
window.TickTackk.DeveloperTools = window.TickTackk.DeveloperTools || {}

;((window, document) =>
{
    'use strict'

    XF.on(document, 'ajax:before-success', ({request, response, status, data}) =>
    {
        if (!data.html || !data.html.permissionErrors)
        {
            return
        }

        let permissionErrorStr = 'Permission errors were triggered when rendering this template:';
        if (data.html.permissionErrorDetails)
        {
            permissionErrorStr += '\n* ' + data.html.permissionErrorDetails.join('\n* ');
        }
        console.error(permissionErrorStr);
    })
})(window, document)