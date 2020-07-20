<?php

namespace App\Controller\Admin;

use App\Entity\Comment;
use App\Entity\Conference;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminController
 * @package App\Controller\Admin
 */
class AdminController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    /**
     * @return Dashboard
     */
    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Guestbook');
    }

    /**
     * @return iterable
     */
    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linktoDashboard('Dashboard', 'fa fa-home'),

            MenuItem::section('Content'),
            MenuItem::linkToCrud('Conferences', 'fa fa-tags', Conference::class)
                ->setQueryParameter('sortField', 'createdAt')
                ->setQueryParameter('sortDirection', 'DESC'),

            MenuItem::linkToCrud('Comments', 'fa fa-tags', Comment::class)
                ->setQueryParameter('sortField', 'createdAt')
                ->setQueryParameter('sortDirection', 'DESC'),

//            MenuItem::linkToLogout('Logout', 'fa fa-exit'),
        ];
    }
}
