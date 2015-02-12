<?php
describe('it', function () {
    it('outputs the definition', function () {
        ob_start();
        it('definition', function () {});
        $output = ob_get_contents();
        ob_get_clean();
        expect($output)->toBe(" definition passed :)\n");
    });
});
