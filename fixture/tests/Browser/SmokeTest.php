<?php

it('shows the welcome page', function () {
    visit('/')->assertSee('get started')->assertNoJavaScriptErrors();
});
