jQuery(function() {
    document.formvalidator.setHandler('quote',
        function (value) {
            regex=/^[^0-9]+$/;
            return regex.test(value);
        });
});
