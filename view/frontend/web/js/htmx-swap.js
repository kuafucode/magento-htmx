define([
    'jquery',
    'Magento_Customer/js/customer-data',
    'underscore'
], function ($, customerData, _) {
    'use strict';

    document.body.addEventListener('htmx:afterSwap', function(evt) {
        const parser = new DOMParser();
        const parsedResponse = parser.parseFromString(evt.detail.xhr.response, "text/html");
        const bodyAttributes = parsedResponse.getElementsByTagName('body')[0].attributes;
        for (const attribute of bodyAttributes) {
            document.body.setAttribute(attribute.name, attribute.value);
        }

        $.mage.init();

        var messages = $.cookieStorage.get('mage-messages');
        if (!_.isEmpty(messages)) {
            customerData.set('messages', {messages: messages});
            $.cookieStorage.set('mage-messages', '');
        }
    });
})
