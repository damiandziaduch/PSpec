<?php
namespace PSpec;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;

/**
 * Class PSpecCommand
 *
 * @package PSpec
 */
class PSpecCommand extends Command
{
    protected function configure()
    {
        $this->setName('run')->setDescription('Rim')->addArgument(
            'path',
            InputArgument::REQUIRED,
            'Path to tests folder'
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $finder = new Finder();
        $finder->files()->in($input->getArgument('path'));
        ob_start();
        foreach ($finder as $file) {
            require_once $file->getRealpath();
        }
        $result = ob_get_contents();
        ob_get_clean();
        $output->writeln($result);
    }
}
