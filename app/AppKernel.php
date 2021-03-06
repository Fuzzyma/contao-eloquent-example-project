<?php

/*
 * This file is part of Contao.
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @license LGPL-3.0+
 */

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

class AppKernel extends Kernel
{
    /**
     * {@inheritdoc}
     */
    public function registerBundles()
    {
        $bundles = [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Doctrine\Bundle\DoctrineCacheBundle\DoctrineCacheBundle(),
            new Knp\Bundle\TimeBundle\KnpTimeBundle(),
            new Lexik\Bundle\MaintenanceBundle\LexikMaintenanceBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Contao\CoreBundle\ContaoCoreBundle(),
            new Contao\CalendarBundle\ContaoCalendarBundle(),
            new Contao\CommentsBundle\ContaoCommentsBundle(),
            new Contao\FaqBundle\ContaoFaqBundle(),
            new Contao\InstallationBundle\ContaoInstallationBundle(),
            new Contao\ListingBundle\ContaoListingBundle(),
            new Contao\NewsBundle\ContaoNewsBundle(),
            new Contao\NewsletterBundle\ContaoNewsletterBundle(),
            new WouterJ\EloquentBundle\WouterJEloquentBundle(),
            new Fuzzyma\Contao\EloquentBundle\ContaoEloquentBundle(),
            new Fuzzyma\Contao\EloquentExampleProjectBundle\ContaoEloquentExampleProjectBundle(),
        ];

        if (in_array($this->getEnvironment(), ['dev', 'test'])) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Fuzzyma\Contao\DatabaseCommandsBundle\ContaoDatabaseCommandsBundle();
        }

        return $bundles;
    }

    /**
     * {@inheritdoc}
     */
    public function getRootDir()
    {
        return __DIR__;
    }

    /**
     * {@inheritdoc}
     */
    public function getCacheDir()
    {
        return $this->getRootDir().'/cache/'.$this->getEnvironment();
    }

    /**
     * {@inheritdoc}
     */
    public function getLogDir()
    {
        return $this->getRootDir().'/logs';
    }

    /**
     * {@inheritdoc}
     */
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
