<?php
use PSpec\PSpecCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

describe('PSpecCommand', function () {
    it('it runs the tests', function () {
        $tmpPath = __DIR__ . '/../tmp';
        @mkdir($tmpPath);
        @file_put_contents(__DIR__ . '/../tmp/tmpSpec.php', '<?php echo("test passed") ?>');

        $application = new Application;
        $application->add(new PSpecCommand);

        $command = $application->find('run');
        $commandTester = new CommandTester($command);
        $commandTester->execute(['command' => $command->getName(), 'path' => $tmpPath]);

        expect($commandTester->getDisplay())->toBe("test passed\n");

        @unlink(__DIR__ . '/../tmp/tmpSpec.php');
        @rmdir(__DIR__ . '/../tmp');
    });
});
