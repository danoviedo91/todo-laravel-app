/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(document).ready(function () {
    $('form').submit(function( event ) {
        var method = $(this).children(':hidden[name=_method]').val();
        if ($.type(method) !== 'undefined' && method == 'DELETE') {
            if (!confirm('Are You Sure?')) {
                event.preventDefault();
            }
        }
    })
});
