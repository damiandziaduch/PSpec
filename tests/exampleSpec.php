<?php

describe('stdClass', function () {
    it('allows to set an property', function () {
        $client = new stdClass();
        $client->property = 'test';
        expect($client->property)->toBe('test');
    });

    it('returns null on empty property', function () {
        $client = new stdClass();
        expect($client->property)->toBe(null);
    });
});
