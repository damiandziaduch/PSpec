<?php
describe('describe', function () {
    it('outputs the description', function () {
        ob_start();
        describe('description', function () {});
        $output = ob_get_contents();
        ob_get_clean();
        expect($output)->toBe('description');
    });
});
