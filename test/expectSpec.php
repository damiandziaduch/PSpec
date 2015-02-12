<?php
require_once __DIR__ . '/bootstrap.php';

describe('expect', function () {
    it('returns the ' . PSpec\Expectation::class, function () {
        expect(get_class(expect('')))->toBe(\PSpec\Expectation::class);
    });
});
